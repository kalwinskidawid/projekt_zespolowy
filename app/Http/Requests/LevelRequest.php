<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LevelRequest extends FormRequest
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
            'name' => [
                'required', 'string',
                Rule::unique('levels')->ignore($this->level)
            ]
        ];
    }

    public function messages()
    {
        return [
            'name.unique' => __('translations.validation.level.name_unique')
        ];
    }

    public function attributes()
    {
        return [
            'name' => __('translations.attributes.main.name')
        ];
    }
}
