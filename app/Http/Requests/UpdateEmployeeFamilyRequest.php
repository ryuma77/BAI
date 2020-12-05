<?php

namespace App\Http\Requests;

use App\Models\EmployeeFamily;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateEmployeeFamilyRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('employee_family_edit');
    }

    public function rules()
    {
        return [
            'employee_name_id' => [
                'required',
                'integer',
            ],
            'family_name'      => [
                'string',
                'max:250',
                'required',
            ],
            'nik_id'           => [
                'required',
                'integer',
            ],
        ];
    }
}
