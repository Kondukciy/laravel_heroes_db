<?php

namespace Tests\Unit;

use App\Http\Controllers\Heroes\HeroesController;
use App\Http\Requests\HeroesCreateRequest;
use App\Models\Heroes;
use Faker\Factory;
use Faker\Generator;
use Illuminate\Http\Request;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;


class CreateHeroTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCreateHero()
    {

        $response = $this->get(route('heroes.create'));

        $nickname = $this->faker->text(rand(20,30));
        $slug = \Str::slug($nickname);
        $real_name = $this->faker->text(rand(10,15));
        $origin_description = $this->faker->text(rand(20,30));
        $superpowers = $this->faker->text(rand(20,30));
        $catch_phrase = $this->faker->text(rand(20,30));

        $request =  HeroesCreateRequest::create(route('heroes.store'), 'POST',[
            'nickname'           => $nickname,
            'slug'               => $slug,
            'real_name'          => $real_name,
            'origin_description' => $origin_description,
            'superpowers'        => $superpowers,
            'catch_phrase'       => $catch_phrase,
        ]);
        $response->assertStatus(200);
        $controller = new HeroesController();
        $response = $controller->store($request);
        $this->assertEquals(302, $response->getStatusCode());
        $hero = Heroes::where('nickname', $nickname)->first();
        $this->assertNotNull($hero);
        Heroes::where('nickname',$nickname)->delete();


    }
    public function testEditHero()
    {
        $hero = factory(Heroes::class)->create();
        $nickname = $this->faker->text(rand(20,30));
        $slug = \Str::slug($nickname);
        $real_name = $this->faker->text(rand(10,15));
        $origin_description = $this->faker->text(rand(20,30));
        $superpowers = $this->faker->text(rand(20,30));
        $catch_phrase = $this->faker->text(rand(20,30));
        $data = [
            'nickname'           => $nickname,
            'slug'               => $slug,
            'real_name'          => $real_name,
            'origin_description' => $origin_description,
            'superpowers'        => $superpowers,
            'catch_phrase'       => $catch_phrase,
        ];
        $this->put(route('heroes.update', $hero->id), $data)
            ->assertStatus(302);
        Heroes::where('nickname',$nickname)->delete();
    }
    public function testShowHero() {
        $hero = factory(Heroes::class)->create();
        $this->get(route('heroes.show', $hero->id))
            ->assertStatus(200);
        Heroes::where('id',$hero->id)->delete();
    }
}
