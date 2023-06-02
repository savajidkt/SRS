<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;


class EditRequest extends FormRequest
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
            'first_name'        => ['required'],
            'last_name'         => ['required'],
            'phone_number'           => ['required'],
            'mobile_number'           => ['required'],
            'email'           => ['email'],
            // 'confirm_email'           => ['confirmed'],
            // 'password'           => [''],
            // 'confirm_password'           => ['confirmed'],
        ];

        // if ($this->attributes->has('password')) {
        //     $rules['confirm_password'] = 'confirmed';
        // }

        // if ($this->attributes->has('some-key')) {
        //      $rules['password'] = 'confirmed';
        // }
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
            'first_name.required' => 'FirstName is required.',
            'last_name.required' => 'LastName is required.',
            'phone_number.required' => 'PhoneNumber is required.',
            'mobile_number.required' => 'MobileNumber is required.',
            'email_address.required' => 'Email is required.',
            // 'confirm_email.required' => 'Confirm Email is Not Same.',
            // 'password.required' => 'Password is required.',
            // 'confirm_password.required' => 'Confirm password is Not Same.',
        ];
    }
}
