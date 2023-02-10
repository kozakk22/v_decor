<?php
namespace App\Http\Requests\Admin\Goods;

use App\Models\Subcategory;
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

            'title' => 'required|string',
            'description' => 'nullable|string',
            'quantity_in_stoke' => 'nullable|numeric',
            'price' => 'nullable|numeric',
            'on_off' => 'nullable',
            'number_of_views' => 'required|numeric',
            'subcategories' => '',
            'image_main' => 'required|image',
            'image_0' => 'nullable|image',
            'image_1' => 'nullable|image',
            'image_2' => 'nullable|image',
            'image_3' => 'nullable|image',
            'image_4' => 'nullable|image',
            'image_5' => 'nullable|image',
            'image_6' => 'nullable|image',
            'image_7' => 'nullable|image',
            'image_8' => 'nullable|image'
        ];
    }

}
