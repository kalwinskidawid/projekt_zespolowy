<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SchoolTypeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
        return [
            'name' => [
                'required', 'string',
                Rule::unique('school_types')->ignore($this->schooltype)
            ]
        ];
    }

    public function messages()
    {
        return [
            'name.unique' => __('translations.validation.school_types.name_unique')
        ];
    }

    public function attributes()
    {
        return [
            'name' => __('translations.attributes.main.name')
        ];
    }
}
