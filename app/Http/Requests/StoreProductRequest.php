<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'code' => 'required',
            'name' => 'required',
            'price' => 'required|integer',
            'category_id' => 'required',
            'subCategory_id' => 'required',
            'description' => 'required',
            'images'         => 'required|array|min:1|max:10',
            'images.*'       => 'required|mimes:jpg,jpeg,png',
            'add_on' => 'required',
            'highlight' => 'required',
            'min_order' => 'required',
            'max_order' => 'required',
            'unit_value' => 'required',
            'unit' => 'required',
            'tags' => 'required',
//            'ingredient' => 'required',
//            'nutrient' => 'required',

        ];
    }
}
