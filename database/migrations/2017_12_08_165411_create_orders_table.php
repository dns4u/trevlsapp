<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('product_name',100);
            $table->string('vehicle_class',100);
            $table->unsignedInteger('passenger_seat');
            $table->string('vehicle_mileage',100);
            $table->string('range',100);
            $table->string('transmission');
            $table->string('stock');
            $table->unsignedInteger('old_price_per_day');
            $table->unsignedInteger('new_price_per_day');
            $table->unsignedInteger('reservation_delivery_price');
            $table->unsignedInteger('discount_rate');
            $table->unsignedInteger('taxes_fees');
            $table->text('description');
            $table->string('product_image');
            $table->string('first_name',100);
            $table->string('last_name',100);
            $table->string('email');
            $table->string('phone');
            $table->text('address');
            $table->string('dropoff_address');
            $table->string('return_address');
            $table->dateTime('from_date');
            $table->dateTime('to_date');
            $table->unsignedInteger('insurance_personal')->nullable();
            $table->unsignedInteger('insurance_roadside')->nullable();
            $table->unsignedInteger('total');
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
        Schema::dropIfExists('orders');
    }
}
