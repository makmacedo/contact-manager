<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreContact extends FormRequest
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
            'company_id' => 'required|exists:companies,id',
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => Rule::in(['male', 'female', null]),
            'mobile' => 'required',
            'email' => 'required|email|unique:contacts'
        ];
    }
}
