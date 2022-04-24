<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CareerRequest extends FormRequest
{
    public function rules(): array
    {
        return [

            'start_date' => ['required', 'date', 'after:startDateTime'],
            'end_date' => ['required', 'date','after:start_date'],
            'position' => ['required', 'string', 'max:255'],
            'description' => ['nullable']
        ];
    }

    public function attributes()
    {
        return [
            'start_date' => __('translations.attributes.main.start_date'),
            'end_date' => __('translations.attributes.main.end_date'),
            'position' => __('translations.attributes.main.position'),
            'description'=> __('translations.attributes.main.description')
        ];
    }
}
