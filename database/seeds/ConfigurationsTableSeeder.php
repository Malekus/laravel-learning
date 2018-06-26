<?php

use Illuminate\Database\Seeder;

class ConfigurationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Configuration::create(['categorie' => 'Problème', 'type' => 'Problème', 'libelle' => 'Couple', 'libelle2' => 'Tension']);
        App\Configuration::create(['categorie' => 'Problème', 'type' => 'Problème', 'libelle' => 'Couple', 'libelle2' => 'Violence']);
        App\Configuration::create(['categorie' => 'Problème', 'type' => 'Problème', 'libelle' => 'Enfant', 'libelle2' => 'ASE']);
        App\Configuration::create(['categorie' => 'Problème', 'type' => 'Problème', 'libelle' => 'Enfant', 'libelle2' => 'CAF']);
        App\Configuration::create(['categorie' => 'Problème', 'type' => 'Problème', 'libelle' => 'Enfant', 'libelle2' => 'Formation']);
        App\Configuration::create(['categorie' => 'Problème', 'type' => 'Problème', 'libelle' => 'Enfant', 'libelle2' => 'MDPH']);
        App\Configuration::create(['categorie' => 'Problème', 'type' => 'Problème', 'libelle' => 'Enfant', 'libelle2' => 'PJJ']);
        App\Configuration::create(['categorie' => 'Problème', 'type' => 'Problème', 'libelle' => 'Enfant', 'libelle2' => 'Scolarité']);
        App\Configuration::create(['categorie' => 'Problème', 'type' => 'Problème', 'libelle' => 'Enfant', 'libelle2' => 'Signalement']);
        App\Configuration::create(['categorie' => 'Problème', 'type' => 'Problème', 'libelle' => 'Enfant', 'libelle2' => 'Violence']);
        App\Configuration::create(['categorie' => 'Problème', 'type' => 'Problème', 'libelle' => 'Enfant', 'libelle2' => 'Tension']);
        App\Configuration::create(['categorie' => 'Problème', 'type' => 'Problème', 'libelle' => 'Enfant', 'libelle2' => 'Autre']);
        App\Configuration::create(['categorie' => 'Partenaire', 'type' => 'Structure', 'libelle' => 'Mairie', 'libelle2' => NULL]);
        App\Configuration::create(['categorie' => 'Partenaire', 'type' => 'Structure', 'libelle' => 'Mairie', 'libelle2' => NULL]);
        App\Configuration::create(['categorie' => 'Personne', 'type' => 'CSP', 'libelle' => 'Etudiant', 'libelle2' => NULL]);
        App\Configuration::create(['categorie' => 'Personne', 'type' => 'CSP', 'libelle' => 'RSA', 'libelle2' => NULL]);
        App\Configuration::create(['categorie' => 'Personne', 'type' => 'Niveau Scolaire', 'libelle' => 'Lycée', 'libelle2' => NULL]);
        App\Configuration::create(['categorie' => 'Personne', 'type' => 'Catégorie', 'libelle' => 'RSA', 'libelle2' => NULL]);
        App\Configuration::create(['categorie' => 'Personne', 'type' => 'Situation', 'libelle' => 'Couple', 'libelle2' => NULL]);
        App\Configuration::create(['categorie' => 'Personne', 'type' => 'Logement', 'libelle' => 'HLM', 'libelle2' => NULL]);
        App\Configuration::create(['categorie' => 'Personne', 'type' => 'CSP', 'libelle' => 'Stagiaire', 'libelle2' => NULL]);
        App\Configuration::create(['categorie' => 'Partenaire', 'type' => 'Type', 'libelle' => 'Elu(e)', 'libelle2' => NULL]);
        App\Configuration::create(['categorie' => 'Personne', 'type' => 'Situation', 'libelle' => 'Célibataire', 'libelle2' => NULL]);
        App\Configuration::create(['categorie' => 'Action', 'type' => 'Action', 'libelle' => 'Suivi', 'libelle2' => NULL]);
        App\Configuration::create(['categorie' => 'Action', 'type' => 'Action', 'libelle' => 'Recherche', 'libelle2' => NULL]);
    }
}
