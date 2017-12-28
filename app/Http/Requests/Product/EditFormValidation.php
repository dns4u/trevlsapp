<?php

namespace App\Http\Requests\Product;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;


class EditFormValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            'product_name'=>'required|string',
            'passenger_seat'=>'required|numeric',
            'vehicle_class'=>'required|string',
            'vehicle_mileage'=>'required|string',
            'range'=>'required|string',
            'transmission'=>'required|string',
            'stock'=>'required|numeric',
            'old_price_per_day'=>'required|numeric',
            'new_price_per_day'=>'required|numeric',
            'reservation_delivery_price'=>'required|numeric',
            'discount_rate'=>'required|numeric',
            'taxes_fees'=>'required|numeric',
            'description'=>'required|string',
            'image'=>'required|image|mimes:jpeg,png',
            'insurance_personal'=>'required|numeric',
            'insurance_roadside'=>'required|numeric',
            'review'=>'required|numeric'
        ];

    }



}
