<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lits', function (Blueprint $table) {
            $table->increments('id');
            $table->string('libelle');
            $table->boolean('est_ocuppe');
            $table->bigInteger('hopital_id')->unsigned()->nullable();
            $table->foreign('hopital_id')->references('id')->on('hopitals');
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
        Schema::dropIfExists('lits');
    }
}
