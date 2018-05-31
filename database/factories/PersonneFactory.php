<?php

use Faker\Generator as Faker;

$factory->define(App\Personne::class, function (Faker $faker) {
    return [
        'nom' => $faker->lastName ,
        'prenom' => $faker->name ,
        'date_naissance' => $faker->dateTime ,
        'sexe' => $faker->randomElement(['homme', 'femme']) ,
        'enfant' => $faker->numberBetween(0, 5) ,
        'csp' => $faker->randomElement(['formation', 'rsa', 'stagiaire', 'autre', 'cada', 'etudiant']) ,
        'categorie' => $faker->randomElement(['MDPH', 'PLI', 'RSA']) ,
        'nationalite' => $faker->country ,
        'logement' => $faker->randomElement(['maison', 'foyer', 'hlm', 'appartenement']),
        'telephone' => $faker->phoneNumber ,
        'email' => $faker->email ,
        'adresse' => $faker->address ,
        'code_postale' => $faker->postcode ,
        'ville' => $faker->city ,
        'prioritaire' => $faker->boolean ,
        'matricule_caf' => $faker->randomNumber
    ];
});
