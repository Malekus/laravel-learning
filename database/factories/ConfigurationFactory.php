<?php

use Faker\Generator as Faker;

$factory->define(App\Configuration::class, function (Faker $faker) {
    return [
        'categorie' => $faker->randomElement(['Personne', 'Problème', 'PartenaireExport', 'Action']),
        'champ' => $faker->randomElement(['Catégorie', 'Type', 'Situation', 'Logement', 'Structure', 'CSP', 'Action', 'Niveau Scolaire']),
        'libelle' => $faker->randomElement(['Tension', 'Violence', 'CAF', 'Formation', 'PJJ', 'MDPH', 'RSA', 'Suivi', 'Lycée', 'Collège', 'Autre'])
    ];
});
