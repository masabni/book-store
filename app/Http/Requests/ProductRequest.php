<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required|max:255',
            'category_id' => 'required|exists:categories,id',
            'author_id' => 'required|exists:authors,id',
            'publisher_id' => 'required|exists:publishers,id',
            'author_role_id' => 'required|exists:author_roles,id',
            'publisher_role_id' => 'required|exists:publisher_roles,id',
            'product_type_id' => 'required|exists:product_types,id',
            'cover_type_id' => 'required|exists:cover_types,id',
            'selling_price' => 'required|numeric',
            'cost_price' => 'required|numeric',
            'image' => 'mimes:jpg,png,jpeg|max:3000',
        ];
    }
}
