<?php

use Faker\Generator as Faker;

$factory->define(\App\CafDate::class, function (Faker $faker) {
    return [
        'motif_id' =>  \App\Configuration::where(['categorie' => 'Caf', 'champ' => 'Motif'])->get()->random()->id,
        'dateCaf' =>  $faker->dateTimeBetween($startDate = '-3 years', $endDate = 'now'),
        'personne_id' => \App\Personne::all()->random()->id,
    ];
});
