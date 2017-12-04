<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

/**
 * Rules to request
 */
class CategoryRequest extends Request
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
            'name' => 'required|min:2'
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
            'name.required' => 'name is required'
        ];
    }
}