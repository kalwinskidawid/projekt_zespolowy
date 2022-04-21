<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LanguageRequest extends FormRequest
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
                Rule::unique('languages')->ignore($this->language)
            ]
        ];
    }

    public function messages()
    {
        return [
            'name.unique' => __('translations.validation.languages.name_unique')
        ];
    }

    public function attributes()
    {
        return [
            'name' => __('translations.attributes.main.name')
        ];
    }
}
