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
        /*App\Probleme::create(['categorie' => 'Couple', 'type' => 'Tension', 'accompagnement' => 'Ponctuel', 'personne_id' => 2]);
        App\Probleme::create(['categorie' => 'Enfant', 'type' => 'Tension', 'accompagnement' => 'Ponctuel', 'personne_id' => 2]);
        App\Probleme::create(['categorie' => 'Couple', 'type' => 'Violence', 'accompagnement' => 'Long court', 'personne_id' => 3]);
        App\Probleme::create(['categorie' => 'Enfant', 'type' => 'CAF', 'accompagnement' => 'Ponctuel', 'personne_id' => 5]);
        */

        factory(\App\Probleme::class, 50)->create();

    }
}
