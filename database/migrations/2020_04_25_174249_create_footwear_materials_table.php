<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFootwearMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('footwear_materials', function (Blueprint $table) {
            $table->bigInteger('footwear_id');
            $table->foreign('footwear_id')->references('id')->on('footwear');
            $table->string('component');
            $table->foreign('component')->references('component')->on('components');
            $table->string('material');
            $table->foreign('material')->references('material')->on('materials');
            $table->decimal('percent', 3, 2);
            $table->primary(['footwear_id','component','material']);
        });

        DB::statement('ALTER TABLE footwear_materials ADD CONSTRAINT chk_percent_value CHECK (percent between 0 and 1);');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('footwear_materials');
    }
}
