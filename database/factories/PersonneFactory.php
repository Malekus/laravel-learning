<?php

use Faker\Generator as Faker;
use \Illuminate\Support\Facades\Crypt;

$factory->define(App\Personne::class, function (Faker $faker) {
    return [
        'nom' => $faker->lastName ,
        'prenom' => $faker->name ,
        'date_naissance' => $faker->dateTimeBetween($startDate = '-80 years', $endDate = 'now'),
        'sexe' => $faker->randomElement(['homme', 'femme']),
        'enfant' => $faker->numberBetween(0, 5) ,
        'csp_id' => \App\Configuration::where(['categorie' => 'Personne', 'champ' => 'CSP'])->get()->random()->id,
        'categorie_id' => \App\Configuration::where(['categorie' => 'Personne', 'champ' =>'Catégorie'])->get()->random()->id,
        'nationalite' => $faker->country ,
        'logement_id' => \App\Configuration::where(['categorie' => 'Personne', 'champ' => 'Logement'])->get()->random()->id,
        'scolarite_id' => \App\Configuration::where(['categorie' => 'Personne', 'champ' => 'Niveau Scolaire'])->get()->random()->id,
        'situation_id' => \App\Configuration::where(['categorie' => 'Personne', 'champ' => 'Situation'])->get()->random()->id,
        'telephone' => $faker->phoneNumber ,
        'email' => $faker->email ,
        'adresse' => $faker->address ,
        'code_postale' => $faker->postcode ,
        'ville' => $faker->city ,
        'prioritaire' => $faker->boolean ,
        'matricule_caf' => $faker->randomNumber,
<<<<<<< HEAD
        'updated_at' => $faker->dateTimeBetween($startDate = '-5 years', $endDate = 'now'),
=======
        'origine' => $faker->country ,
        'updated_at' => $faker->dateTimeBetween($startDate = '-3 years', $endDate = 'now'),
>>>>>>> 35396fed6bc192299020bd5c691f581f5f3adfb5
    ];
});
