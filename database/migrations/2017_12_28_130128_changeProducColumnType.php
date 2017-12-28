<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeProducColumnType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            
            $table->double('old_price_per_day')->change();
            $table->double('new_price_per_day')->change();
            $table->double('reservation_delivery_price')->change();
            $table->double('discount_rate')->change();
            $table->double('taxes_fees')->change();
            $table->double('insurance_personal')->nullable()->change();
            $table->double('insurance_roadside')->nullable()->change();
            $table->double('total')->change();
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
