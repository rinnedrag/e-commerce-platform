<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateFootwearInsoleMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('footwear_insole_materials', function (Blueprint $table) {
            $table->bigInteger('footwear_id');
            $table->string('material');
            $table->foreign('footwear_id')->references('id')->on('footwear');
            $table->foreign('material')->references('material')->on('materials');
            $table->unique(['material','footwear_id']);
            $table->decimal('percent',3,2);
        });

        DB::statement('ALTER TABLE footwear_insole_materials ADD CONSTRAINT chk_percent_value CHECK (percent between 0 and 1);');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('footwear_insole_materials');
    }
}
