<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImageHeroesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_heroes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('heroes_id')->unsigned();
            $table->string('src');
            $table->boolean('main');
            $table->timestamps();
            $table->foreign('heroes_id')->references('id')->on('heroes');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('image_heroes');
    }
}
