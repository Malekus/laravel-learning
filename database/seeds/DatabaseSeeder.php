<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ConfigurationTableSeeder::class,
            PersonneTableSeeder::class,
            PersonneTableSeeder::class,
            PartenaireTableSeeder::class,
            PartenaireTableSeeder::class,
            ProblemeTableSeeder::class,
            ActionTableSeeder::class,
            ProblemeTableSeeder::class,
            ActionTableSeeder::class,
            CafDateTableSeeder::class,
        ]);
    }
}
