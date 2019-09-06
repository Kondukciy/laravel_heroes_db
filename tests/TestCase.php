<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Faker\Factory;
use Faker\Generator;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    private function prepareForTests()
    {
        \Artisan::call('migrate');


    }
    protected $faker;
    public function setUp():void
    {
        parent::setUp();
        $this->faker = Factory::create();
        $this->prepareForTests();
    }
}
