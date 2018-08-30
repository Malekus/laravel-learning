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
            $table->string('deplacement')->nullable();
            $table->string('duree')->nullable();
            $table->boolean('information')->nullable();
            $table->boolean('droitOuvert')->nullable();
            $table->boolean('maintienDroit')->nullable();
            $table->boolean('conflit')->nullable();
            $table->boolean('perduDeVue')->nullable();
            $table->boolean('judiciarisation')->nullable();
            $table->string('avancement')->nullable();
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
