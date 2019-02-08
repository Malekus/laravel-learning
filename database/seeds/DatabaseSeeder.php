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
            ConfigurationsTableSeeder::class,
            PersonnesTableSeeder::class,
            ProblemesTableSeeder::class,
            /*PartenaireTableSeeder::class,

            ActionTableSeeder::class
            */
        ]);
    }
}
