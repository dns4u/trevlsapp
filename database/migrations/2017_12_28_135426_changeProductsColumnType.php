<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeProductsColumnType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            
            $table->unsignedDecimal('old_price_per_day')->change();
            $table->unsignedDecimal('new_price_per_day')->change();
            $table->unsignedDecimal('reservation_delivery_price')->change();
            $table->unsignedDecimal('discount_rate')->change();
            $table->unsignedDecimal('taxes_fees')->change();
            $table->unsignedDecimal('insurance_personal')->nullable()->change();
            $table->unsignedDecimal('insurance_roadside')->nullable()->change();
            $table->unsignedDecimal('review')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
