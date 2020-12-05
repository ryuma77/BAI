<?php

namespace App\Http\Requests;

use App\Models\Employee;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreEmployeeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('employee_create');
    }

    public function rules()
    {
        return [
            'nik'             => [
                'string',
                'min:4',
                'max:12',
                'required',
                'unique:employees',
            ],
            'nama'            => [
                'string',
                'max:250',
                'required',
            ],
            'tempat_lahir'    => [
                'string',
                'max:150',
                'required',
            ],
            'tanggal_lahir'   => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'jenis_kelamin'   => [
                'required',
            ],
            'division_id'     => [
                'required',
                'integer',
            ],
            'department_id'   => [
                'required',
                'integer',
            ],
            'position_id'     => [
                'required',
                'integer',
            ],
            'alamat'          => [
                'string',
                'nullable',
            ],
            'kota'            => [
                'string',
                'nullable',
            ],
            'kode_pos'        => [
                'string',
                'nullable',
            ],
            'employee_status' => [
                'required',
            ],
        ];
    }
}
