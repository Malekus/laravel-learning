<?php

use Faker\Generator as Faker;

$factory->define(\App\CafDate::class, function (Faker $faker) {
    return [
        'motif_id' =>  \App\Configuration::where(['categorie' => 'Caf', 'champ' => 'Action'])->get()->random()->id,
        'dateCaf' => $faker->date(),
        'personne_id' => \App\Personne::all()->random()->id,
    ];
});
