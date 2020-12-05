<?php

namespace App\Http\Requests;

use App\Models\Salary;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSalaryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('salary_create');
    }

    public function rules()
    {
        return [
            'employee_id'  => [
                'required',
                'integer',
            ],
            'basic_salary' => [
                'required',
            ],
            'bpjs.*'       => [
                'integer',
            ],
            'bpjs'         => [
                'array',
            ],
            'tunjangans.*' => [
                'integer',
            ],
            'tunjangans'   => [
                'array',
            ],
            'potongans.*'  => [
                'integer',
            ],
            'potongans'    => [
                'array',
            ],
        ];
    }
}
