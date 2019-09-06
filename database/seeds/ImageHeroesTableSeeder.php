<?php

use Illuminate\Database\Seeder;

class ImageHeroesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $image_heroes = [];

        /*
         * Superman images
         */
        $image_heroes[] = [
            'heroes_id' => '1',
            'src' => 'superman/superman.jpg',
            'main' => true,
        ];
        $image_heroes[] = [
            'heroes_id' => '1',
            'src' => 'superman/superman_1.jpg',
            'main' => false,
        ];

        /*
        * Iron-man images
        */
        $image_heroes[] = [
            'heroes_id' => '2',
            'src' => 'iron-man/ironman.jpg',
            'main' => true,
        ];
        $image_heroes[] = [
            'heroes_id' => '2',
            'src' => 'iron-man/ironman_1.jpg',
            'main' => false,
        ];

        /*
        * Hulk images
        */
        $image_heroes[] = [
            'heroes_id' => '3',
            'src' => 'hulk/hulk.jpg',
            'main' => true,
        ];
        $image_heroes[] = [
            'heroes_id' => '3',
            'src' => 'hulk/hulk_1.jpg',
            'main' => false,
        ];

        DB::table('image_heroes')->insert($image_heroes);
    }
}
