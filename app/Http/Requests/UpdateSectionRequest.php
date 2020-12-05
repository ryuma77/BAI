<?php

namespace App\Http\Requests;

use App\Models\Section;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSectionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('section_edit');
    }

    public function rules()
    {
        return [
            'section_code'       => [
                'string',
                'required',
                'unique:sections,section_code,' . request()->route('section')->id,
            ],
            'section_name'       => [
                'string',
                'required',
                'unique:sections,section_name,' . request()->route('section')->id,
            ],
            'department_name_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
