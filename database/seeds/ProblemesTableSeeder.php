<?php

use Illuminate\Database\Seeder;

class ProblemesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Probleme::class, 50)->create();

    }
}
