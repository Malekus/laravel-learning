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
            $table->string('prenom')->nullable();
            $table->date('date_naissance')->nullable();
            $table->string('sexe', 256)->nullable();
            $table->integer('enfant')->nullable();
            $table->string('csp')->nullable();
            $table->string('categorie')->nullable();
            $table->string('nationalite')->nullable();
            $table->string('logement')->nullable();
            $table->string('telephone')->nullable();
            $table->string('email')->nullable();
            $table->string('adresse')->nullable();
            $table->string('code_postale')->nullable();
            $table->string('ville')->nullable();
            $table->boolean('prioritaire')->nullable();
            $table->string('matricule_caf')->nullable();
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
