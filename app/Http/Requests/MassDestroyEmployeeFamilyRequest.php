<?php

namespace App\Http\Requests;

use App\Models\EmployeeFamily;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyEmployeeFamilyRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('employee_family_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:employee_families,id',
        ];
    }
}
