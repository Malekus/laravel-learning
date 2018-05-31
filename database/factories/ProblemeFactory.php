<?php

use Faker\Generator as Faker;

$factory->define(\App\Probleme::class, function (Faker $faker) {
    return [
        'categorie' => $faker->randomElement(['amendes', 'couple', 'consommation', 'partenaire', 'prison', 'sante']),
        'type' => $faker->randomElement(['tension', 'violence', 'dossier', 'fraude', 'apl', 'autre'])
    ];
});
