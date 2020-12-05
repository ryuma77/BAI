<?php

namespace App\Http\Requests;

use App\Models\Section;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSectionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('section_create');
    }

    public function rules()
    {
        return [
            'section_code'       => [
                'string',
                'required',
                'unique:sections',
            ],
            'section_name'       => [
                'string',
                'required',
                'unique:sections',
            ],
            'department_name_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
