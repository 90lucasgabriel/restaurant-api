<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

/**
 * Rules to request
 */
class ProductRequest extends Request
{
    /**
     * Rules to authorize access.
     *
     * @return void
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Requirements and rules.
     *
     * @return void
     */
    public function rules()
    {
        return [
            'category_id'   => 'required',
            'name'          => 'required'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'category_id.required' => 'category_id is required',
            'name.required' => 'name is required'
        ];
    }
}