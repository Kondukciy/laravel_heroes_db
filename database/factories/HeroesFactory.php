<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(\App\Models\Heroes::class, function (Faker $faker) {

    $nickname = $this->faker->text(rand(20,30));
    $slug = \Str::slug($nickname);
    $real_name = $this->faker->text(rand(10,15));
    $origin_description = $this->faker->text(rand(20,30));
    $superpowers = $this->faker->text(rand(20,30));
    $catch_phrase = $this->faker->text(rand(20,30));
    return [
        'nickname'           => $nickname,
        'slug'               => $slug,
        'real_name'          => $real_name,
        'origin_description' => $origin_description,
        'superpowers'        => $superpowers,
        'catch_phrase'       => $catch_phrase,
    ];
});
