<?php

namespace App\Http\Requests;

use App\Models\Department;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDepartmentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('department_create');
    }

    public function rules()
    {
        return [
            'department_name'  => [
                'string',
                'required',
                'unique:departments',
            ],
            'department_code'  => [
                'string',
                'min:1',
                'max:10',
                'required',
                'unique:departments',
            ],
            'division_name_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
