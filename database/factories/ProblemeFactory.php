<?php

use Faker\Generator as Faker;

$factory->define(\App\Probleme::class, function (Faker $faker) {
    return [
        'personne_id' => \App\Personne::all()->random()->id,
        'resolu' => $faker->randomElement([true, false]),
        'categorie_id' => \App\Configuration::where('champ', 'Catégorie')->get()->random()->id,
        'type_id' => \App\Configuration::where('champ', 'Type')->get()->random()->id,
        'accompagnement_id' => \App\Configuration::where('champ', 'Accompagnement')->get()->random()->id,
    ];
});
