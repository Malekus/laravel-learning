<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCafDateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cafDates', function (Blueprint $table) {
            $table->increments('id');
            $table->date('dateCaf');
            $table->integer('motif_id')->unsigned()->nullable();
            $table->foreign('motif_id')->references('id')->on('configurations')->onDelete('cascade');
            $table->integer('personne_id')->unsigned()->index();
            $table->foreign('personne_id')->references('id')->on('personnes')->onDelete('cascade');
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
        Schema::dropIfExists('cafDates');
    }
}
