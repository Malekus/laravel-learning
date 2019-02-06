<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('action', function (Blueprint $table) {
            $table->increments('id');
            $table->string('deplacement')->default(0)->nullable();
            $table->integer('duree')->default(0)->nullable();
            $table->boolean('information')->default(false)->nullable();
            $table->boolean('droitOuvert')->default(false)->nullable();
            $table->boolean('maintienDroit')->default(false)->nullable();
            $table->boolean('conflit')->default(false)->nullable();
            $table->boolean('perduDeVue')->default(false)->nullable();
            $table->boolean('judiciarisation')->default(false)->nullable();
            $table->string('avancement')->default("en cours")->nullable();
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
        Schema::dropIfExists('action');
    }
}
