<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideoLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video_links', function (Blueprint $table) {
            $table->id();
            $table->string('filename');
            $table->integer('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('admin_id');
            $table->foreign('admin_id')->references('id')->on('users');
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
        Schema::dropIfExists('video_links');
    }
}
