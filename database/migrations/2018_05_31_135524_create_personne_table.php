<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonneTable extends Migration
{
    /**
     * Run tdhe migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personne', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->string('prenom');
            $table->date('date_naissance');
            $table->string('sexe');
            $table->integer('enfant');
            $table->string('csp');
            $table->string('categorie');
            $table->string('nationalite');
            $table->string('logement');
            $table->string('telephone');
            $table->string('email');
            $table->string('adresse');
            $table->string('code_postale');
            $table->string('ville');
            $table->boolean('prioritaire');
            $table->string('matricule_caf');      
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personne');
    }
}
