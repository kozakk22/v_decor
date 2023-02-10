<?php

namespace App\Http\Requests\Admin\Shops;

use Illuminate\Foundation\Http\FormRequest;

class Request extends FormRequest
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
            'name_manager' => 'nullable|string',
            'mail' => 'nullable|Email',
            'phone' => 'nullable|string',
            'instagram' => 'nullable|url',
            'delivery_rules' => '',
            'payment_rules' => '',
            'logo' => 'nullable|image',
            'description' => '',
            'keywords' => '',
            'name_shop' => 'required|string',
        ];
    }
}
