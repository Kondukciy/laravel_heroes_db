<?php

use Illuminate\Database\Seeder;

class HeroesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $heroes = [];


        $heroes[] = [
            'id'                 => '1',
            'nickname'           => 'Superman',
            'slug'               => \Illuminate\Support\Str::slug('Superman'),
            'real_name'          => 'Clark Kent',
            'origin_description' => 'he was born Kal-El on the planet Krypton, before being 
            rocketed to Earth as an infant by his scientist father Jor-El, moments before Krypton\'s destruction…',
            'superpowers'        => 'solar energy absorption and healing factor, solar flare and heat vision, solar invulnerability, flight…',
            'catch_phrase'       => 'Look, up in the sky, it\'s a bird, it\'s a plane, it\'s Superman!',

        ];

        $heroes[] = [
            'id'                 => '2',
            'nickname'           => 'Iron-man',
            'slug'               => \Illuminate\Support\Str::slug('Iron-man'),
            'real_name'          => 'Anthony Edward Stark',
            'origin_description' => 'Anthony Stark, son of industrialist and inventor Howard Stark, demonstrated his mechanical aptitude and extraordinary inventive genius at a very early age, enrolling in the undergraduate electrical engineering program at the Massachusetts Institute of Technology at the age of 15.',
            'superpowers'        => 'Direct Cybernetic Interface, Wireless Communication, Superhuman Reflexes',
            'catch_phrase'       => 'I`m Iron-man!',

        ];
        $heroes[] = [
            'id'                 => '3',
            'nickname'           => 'Hulk',
            'slug'               => \Illuminate\Support\Str::slug('Hulk'),
            'real_name'          => 'Bruce Banner',
            'origin_description' => 'Robert Bruce Banner was the son of an alcoholic who deeply hated him. Banner\'s mother showed much affection for her child, who returned her love, but this only served to fuel his father\'s rage. Dr. Brian Banner was an atomic physicist who worked on producing clean nuclear power as an energy source, but he was afraid his exposure to it mutated his son\'s genes.',
            'superpowers'        => 'Transformation, Superhuman Strength, Self Sustenance',
            'catch_phrase'       => 'Hulk smash!',

        ];
        DB::table('heroes')->insert($heroes);
    }
}
