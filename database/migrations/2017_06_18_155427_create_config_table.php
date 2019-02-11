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




        Schema::table('action', function (Blueprint $table){

        });

        Schema::table('action', function (Blueprint $table){

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
