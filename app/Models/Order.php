<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table='orders';
    protected $fillable=[
        'product_name','passenger_seat','vehicle_class','vehicle_mileage','range',
        'transmission','stock','old_price_per_day','new_price_per_day','reservation_delivery_price',
        'discount_rate','taxes_fees','description','product_image','first_name','last_name','email',
        'phone','address','dropoff_address','return_address','from_date','to_date',
        'insurance_personal','insurance_roadside'

    ];
}
