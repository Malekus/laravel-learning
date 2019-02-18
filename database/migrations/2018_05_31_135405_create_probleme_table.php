<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

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
            $table->date('dateProbleme')->default(Carbon::now());
            $table->integer('personne_id')->nullable()->unsigned();
            $table->foreign('personne_id')->references('id')->on('personnes')->onDelete('set null');
            $table->integer('partenaire_id')->nullable()->unsigned();
            $table->foreign('partenaire_id')->references('id')->on('partenaires')->onDelete('set null');
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