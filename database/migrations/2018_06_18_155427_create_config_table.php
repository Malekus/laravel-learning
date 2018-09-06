<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configuration', function (Blueprint $table) {
            $table->increments('id');
            $table->string('categorie');
            $table->string('champ');
            $table->string('libelle');
            $table->timestamps();
            $table->unique(['categorie', 'champ', 'libelle']);


        });



        Schema::table('probleme', function (Blueprint $table){
            $table->integer('categorie_id')->unsigned()->index();
        });

        Schema::table('probleme', function (Blueprint $table){
            $table->integer('type_id')->unsigned()->index();
        });

        Schema::table('probleme', function (Blueprint $table){
            $table->integer('accompagnement_id')->unsigned()->index();
        });

        Schema::table('personne', function (Blueprint $table){
            $table->integer('logement_id')->unsigned()->nullable()->index()->onDelete('null');
        });

        Schema::table('personne', function (Blueprint $table){
            $table->integer('csp_id')->unsigned()->nullable()->index();
        });

        Schema::table('personne', function (Blueprint $table){
            $table->integer('categorie_id')->nullable()->unsigned()->index();
        });

        Schema::table('action', function (Blueprint $table){
            $table->integer('action_id')->unsigned()->index();
        });

        Schema::table('action', function (Blueprint $table){
            $table->integer('complement_id')->unsigned()->nullable()->index();
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('config');
    }
}
