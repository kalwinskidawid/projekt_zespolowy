<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SkillRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {

        return [
            'technology_id' => ['required', 'integer', 'exists:technologies,id'],
            'level_id' => ['required', 'integer', 'exists:levels,id']
        ];
    }

    public function attributes()
    {
        return [];
    }
}
