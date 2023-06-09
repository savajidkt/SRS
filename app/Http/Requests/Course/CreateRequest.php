<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;


class CreateRequest extends FormRequest
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
        $rules = [
            'company_name'        => ['required'],
            'address_one'        => ['required'],
            'address_tow'        => ['required'],
            'town'        => ['required'],
            'country'        => ['required'],
            'post_code'        => ['required'],
            'notes'        => ['required'],
        ];

        return $rules;
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'company_name.required' => 'CompanyName is required.',
            'address_one.required' => 'AddressOne is required.',
            'address_tow.required' => 'AddressTow is required.',
            'town.required' => 'Town is required.',
            'country.required' => 'Country is required.',
            'post_code.required' => 'PostCode is required.',
            'notes.required' => 'Notes is required.',
        ];
    }
}
