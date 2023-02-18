<?php

namespace App\Http\Requests\Admin\Orders;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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

            'quantity' => 'nullable|numeric',
            'price' => 'nullable|numeric',
            'percent_discount' => 'nullable|numeric',
            'type_payment_id' => 'numeric',
            'addition' => 'nullable|string',
            'status' => 'numeric',
            'reason_for_not_sending' => 'nullable|string',
            'reason_for_return' => 'nullable|string',
            'page' => ''


        ];
    }
}
