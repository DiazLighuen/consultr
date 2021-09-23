<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeroesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('heroes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('fullName')->nullable();
            $table->integer('strength');
            $table->integer('speed');
            $table->integer('durability');
            $table->integer('power');
            $table->integer('combat');
            $table->bigInteger('race_id')->unsigned()->nullable();
            $table->string('height0');
            $table->string('height1')->nullable();
            $table->string('weight0');
            $table->string('weight1');
            $table->string('eyeColor');
            $table->string('hairColor');
            $table->bigInteger('publisher_id')->unsigned()->nullable();
            $table->foreign('race_id')->references('id')->on('races');
            $table->foreign('publisher_id')->references('id')->on('publishers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('heroes');
    }
}
