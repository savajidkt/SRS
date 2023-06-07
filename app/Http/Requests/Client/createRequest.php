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
            'first_name'        => ['required'],
            'last_name'        => ['required'],
            'phone_number'        => ['required'],
            'mobile_number'        => ['required'],
            'email'        => ['required'],
            'job_title'        => ['required'],
            // 'status'         => ['required'],
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
            'first_name.required' => 'FirstName is required.',
            'last_name.required' => 'LastName is required.',
            'phone_number.required' => 'PhoneNumber is required.',
            'mobile_number.required' => 'MobileNumber is required.',
            'email.required' => 'Email is required.',
            'job_title.required' => 'Type is required.'
            // 'status.required' => 'Status is required.'
        ];
    }
}
