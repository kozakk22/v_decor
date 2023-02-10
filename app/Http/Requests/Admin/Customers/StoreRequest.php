<?php
namespace App\Http\Requests\Admin\Customers;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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

            'phone_number' => 'nullable|string',
            'fio' => 'nullable|string',
            'city' => 'nullable|string',
            'post_number' => 'nullable|string',
            'mail' => 'nullable|string',

        ];
    }

}
