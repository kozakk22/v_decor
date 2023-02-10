<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderCardRequest extends FormRequest
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
            'quantity' => 'numeric|required|max:5',
            'phone_number' => 'string|required|max:19',
            'fio' => 'string|nullable',
            'city' => 'string|nullable',
            'post_number' => 'string|nullable',
            'mail' => 'Email|nullable',
        ];
    }
}
