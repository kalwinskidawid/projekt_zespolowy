<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TechnologyRequest extends FormRequest
{
    /**
     * @var mixed
     */

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
                Rule::unique('technologies')->ignore($this->technology)
            ]
        ];
    }

    public function messages()
    {
        return [
            'name.unique' => __('translations.validation.technology.name_unique')
        ];
    }

    public function attributes()
    {
        return [
            'name' => __('translations.attributes.main.name')
        ];
    }

}
