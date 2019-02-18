<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('deplacement')->default(0)->nullable();
            $table->integer('duree')->default(0)->nullable();
            $table->date('dateAction')->default(Carbon::now());
            $table->boolean('information')->default(false)->nullable();
            $table->boolean('droitOuvert')->default(false)->nullable();
            $table->boolean('maintienDroit')->default(false)->nullable();
            $table->boolean('conflit')->default(false)->nullable();
            $table->boolean('perduDeVue')->default(false)->nullable();
            $table->boolean('judiciarisation')->default(false)->nullable();
            $table->string('avancement')->default("en cours")->nullable();
            $table->integer('probleme_id')->unsigned()->index();
            $table->foreign('probleme_id')->references('id')->on('problemes')->onDelete('cascade');

            $table->integer('action_id')->unsigned()->index();
            $table->foreign('action_id')->references('id')->on('configurations')->onDelete('cascade');
            $table->integer('complement_id')->unsigned()->nullable()->index();
            $table->foreign('complement_id')->references('id')->on('configurations')->onDelete('set null');

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
        Schema::dropIfExists('actions');
    }
}
