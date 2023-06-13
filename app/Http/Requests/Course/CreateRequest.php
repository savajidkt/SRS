<?php

namespace App\Http\Requests\Course;

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
            'course_category_id'        => ['required'],
            'start_date'        => ['required'],
            'end_date'        => ['required'],
            'duration'        => ['required'],
            'client_id' => ['required'],
            'path'        => ['required'],
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
            'course_category_id.required' => 'CourseCategoryId is required.',
            'start_date.required' => 'StartDate is required.',
            'end_date.required' => 'EndDate is required.',
            'duration.required' => 'Duration is required.',
            'client_id.required' => 'ClientId is required.',
            'path.required' => 'Path is required.',
        ];
    }
}
