<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFootwearColorSizeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('footwear_color_size', function (Blueprint $table) {
            $table->bigInteger('footwear_id');
            $table->string('color');
            $table->integer('size');
            $table->integer('count');
            $table->primary(['footwear_id', 'color', 'size']);
            $table->foreign('color')->references('color')->on('colors');
            $table->foreign('size')->references('size')->on('sizes');
            $table->foreign('footwear_id')->references('id')->on('footwear');
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
        Schema::dropIfExists('footwear_color_size');
    }
}

