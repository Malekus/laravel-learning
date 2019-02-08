<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProblemeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('problemes', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('resolu')->default(false);

            $table->integer('personne_id')->unsigned()->index();
            $table->foreign('personne_id')->references('id')->on('personnes')->onDelete('cascade');
            $table->integer('categorie_id')->unsigned()->index();
            $table->foreign('categorie_id')->references('id')->on('configurations')->onDelete('cascade');
            $table->integer('type_id')->unsigned()->index();
            $table->foreign('type_id')->references('id')->on('configurations')->onDelete('cascade');
            $table->integer('accompagnement_id')->unsigned()->index();
            $table->foreign('accompagnement_id')->references('id')->on('configurations')->onDelete('cascade');

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
        Schema::dropIfExists('problemes');
    }
}


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


            $table->integer('logement_id')->nullable()->unsigned()->index();
            $table->foreign('logement_id')->references('id')->on('configurations')->onDelete('set null');

*/