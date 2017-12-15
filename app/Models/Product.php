<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=['product_name','passenger_seat','vehicle_class','vehicle_mileage','range',
        'transmission','stock','old_price_per_day','new_price_per_day','reservation_delivery_price',
        'discount_rate','taxes_fees','description','product_image','insurance_personal','insurance_roadside','review'

    ];
}
