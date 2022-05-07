<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CertificateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
//    public function authorize()
//    {
//        return false;
//    }

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
                Rule::unique('certificates')->ignore($this->certificate)
            ]
        ];
    }

    public function messages()
    {
        return [
            'name.unique' => __('translations.validation.certificates.name_unique')
        ];
    }

    public function attributes()
    {
        return [
            'name' => __('translations.attributes.main.name')
        ];
    }
}
