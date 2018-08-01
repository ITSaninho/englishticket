<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnglishTopTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('english_top', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('english_id');
            $table->integer('word');
            $table->integer('top1000')->default(0);
            $table->integer('top5000')->default(0);
            $table->integer('top10000')->default(0);
            $table->integer('other')->default(1);
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
        Schema::dropIfExists('english_top');
    }
}
