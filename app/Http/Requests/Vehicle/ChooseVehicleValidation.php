<?php

namespace App\Http\Requests\Vehicle;

use Illuminate\Foundation\Http\FormRequest;

class ChooseVehicleValidation extends FormRequest
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
            'dropoffAddress'=>'required|string',
            'datepickerFrom'=>'required|date|before:datepickerTo|after:today',
            'datepickerTo'=>'required|date'
        ];
    }
    public function messages()
    {
        return [
            'dropoffAddress.required'=>'Dropoff Address Is Required.',
            'dropoffAddress.string'=>'Dropoff Address Must Be String.',
            'returnAddress.required'=>'Return Address Is Required.',
            'returnAddress.string'=>'Return Address Must Be String.',
            'datepickerFrom.required'=>'From Date Is Required.',
            'datepickerFrom.date'=>'From Date Is Must Be valid Date.',
            'datepickerFrom.before'=>'From Date must Be A Date Before To.',
            'datepickerFrom.after'=>'From Date must Be A Date After Yesterday.',

            'datepickerTo.required'=>'To Date Is Required.',
            'datepickerTo.date'=>'To Date Is Must Be valid Date.',
            'datepickerTo.after'=>'To Date Must Be A Date After From Date.',
        ];
    }
}
