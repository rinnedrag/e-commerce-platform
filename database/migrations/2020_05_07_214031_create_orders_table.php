<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('phone_number');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('town');
            $table->string('street');
            $table->string('building');
            $table->string('flat');
            $table->integer('postcode');
            $table->string('shipping');
            $table->string('order_status');
            $table->float('total');
            $table->string('billing_method')->default('card');
            $table->boolean('is_billed')->default(FALSE);
            $table->timestamps();
        });

        DB::statement("ALTER TABLE orders ADD CONSTRAINT chk_phone_number CHECK (phone_number ~* '^((\+7|7|8)+([0-9]){10})$');");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
