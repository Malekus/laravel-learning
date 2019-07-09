<?php

use Illuminate\Database\Seeder;

class CafDateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\CafDate::class, 500)->create();
    }
}
