<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFootwearModelSizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('footwear_model_sizes', function (Blueprint $table) {
            $table->bigInteger('model_id');
            $table->integer('size');
            $table->integer('count');
            $table->primary(['model_id', 'size']);
            $table->foreign('model_id')->references('id')->on('footwear_models');
            $table->foreign('size')->references('size')->on('sizes');
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
        Schema::dropIfExists('footwear_model_sizes');
    }
}

