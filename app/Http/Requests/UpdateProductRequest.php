<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
        $limit      = ($this->old) ? 10 - count($this->old) : 10;
        $img_status = ($this->old) ? 'nullable' : 'required';

        return [
            'code' => 'required',
            'name' => 'required',
            'price' => 'required|integer',
            'category_id' => 'required|',
            'subCategory_id' => 'required',
            'description' => 'required',
            'add_on' => 'required',
            'highlight' => 'required',
            'min_order' => 'required',
            'max_order' => 'required',
            'unit_value' => 'required',
            'unit' => 'required',
            'tags' => 'required',
//            'ingredient' => 'required',
//            'nutrient' => 'required',


            'images'   => "nullable|array|min:1|max:$limit",
            'images.*' => "nullable|mimes:jpg,jpeg,png",
        ];
    }
}
