<?php

namespace App\Http\Requests;

use App\Models\Contact;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateContact extends FormRequest
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
    public function rules(Contact $contact)
    {
        return [
            'company_id' => 'sometimes|required|exists:companies,id',
            'first_name' => 'sometimes|required',
            'last_name' => 'sometimes|required',
            'gender' => 'in:male,female',
            'mobile' => 'sometimes|required',
            'email' => [
                'sometimes',
                'required', 
                'email', 
                Rule::unique('contacts')->ignore($contact)
            ],
        ];
    }
}
