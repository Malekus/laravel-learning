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
        Schema::create('probleme', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('resolu')->default(false);
            $table->timestamps();
        });

        Schema::table('action', function (Blueprint $table){
            $table->integer('probleme_id')->unsigned()->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('probleme');
    }
}
