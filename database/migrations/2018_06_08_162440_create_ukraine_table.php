<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUkraineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ukraine', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->integer('word');
            $table->integer('phrases');
            $table->integer('theme_id');
            $table->integer('quastion');
            $table->integer('answer');
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
        Schema::dropIfExists('ukraine');
    }
}
