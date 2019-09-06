<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GetCreatePageTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetCreatePageTest()
    {
        $response = $this->get(route('heroes.create'));

        $response->assertStatus(200);
    }
}
