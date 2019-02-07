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
        Schema::create('configurations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('categorie');
            $table->string('champ');
            $table->string('libelle');
            $table->timestamps();
            $table->unique(['categorie', 'champ', 'libelle']);
        });


        /*
        Schema::table('probleme', function (Blueprint $table){
            $table->integer('categorie_id')->unsigned()->index();
        });

        Schema::table('probleme', function (Blueprint $table){
            $table->integer('type_id')->unsigned()->index();
        });

        Schema::table('probleme', function (Blueprint $table){
            $table->integer('accompagnement_id')->unsigned()->index();
        });



        Schema::table('action', function (Blueprint $table){
            $table->integer('action_id')->unsigned()->index();
        });

        Schema::table('action', function (Blueprint $table){
            $table->integer('complement_id')->unsigned()->nullable()->index();
        });

        Schema::table('partenaire', function (Blueprint $table){
            $table->integer('structure_id')->unsigned()->nullable()->index();
        });

        Schema::table('partenaire', function (Blueprint $table){
            $table->integer('type_id')->nullable()->unsigned()->index();
        });
        */

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('configurations');
    }
}
