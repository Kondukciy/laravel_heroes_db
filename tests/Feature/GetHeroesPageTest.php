<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GetHeroesPageTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetHeroPageTest()
    {
        $response = $this->get(route('heroes.index'));

        $response->assertStatus(200);
    }
}
