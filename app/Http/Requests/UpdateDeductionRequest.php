<?php

namespace App\Http\Requests;

use App\Models\Deduction;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDeductionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('deduction_edit');
    }

    public function rules()
    {
        return [
            'kode_allowance' => [
                'string',
                'max:10',
                'required',
                'unique:deductions,kode_allowance,' . request()->route('deduction')->id,
            ],
            'allowance'      => [
                'string',
                'required',
                'unique:deductions,allowance,' . request()->route('deduction')->id,
            ],
            'allowance_type' => [
                'required',
            ],
            'nilai'          => [
                'numeric',
                'required',
            ],
            'keterangan'     => [
                'string',
                'nullable',
            ],
        ];
    }
}
