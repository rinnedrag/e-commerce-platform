<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFootwearTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('footwear', function (Blueprint $table) {
            $table->bigIncrements('id');
            #$table->integer('set_number')->unique(); # артикул зависит от разных параметров, здесь ему не место
            $table->string('kind');
            $table->foreign('kind')->references('kind')->on('footwear_kinds');
            $table->string('brand');
            $table->foreign('brand')->references('brand')->on('footwear_brands');
            $table->string('photos')->default('images/footwear/');
            $table->text('description');
            $table->double('price');
            $table->enum('gender', ['мужская', 'женская','детская']);
            $table->enum('season', ['лето','зима','демисезон','круглогодичный']);
            $table->string('producer_country');
            $table->foreign('producer_country')->references('country')->on('countries');
            $table->string('brand_country');
            $table->foreign('brand_country')->references('country')->on('countries');
            $table->string('style');
            $table->char('fitting');
            $table->foreign('fitting')->references('literal')->on('fitting');
            $table->string('heel_kind');
            $table->foreign('heel_kind')->references('kind')->on('heel_kinds');
            $table->string('clasp_kind');
            $table->foreign('clasp_kind')->references('kind')->on('clasp_kinds');
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
        Schema::dropIfExists('footwear');
    }
}
