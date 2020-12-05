<?php

namespace App\Http\Requests;

use App\Models\Deduction;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDeductionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('deduction_create');
    }

    public function rules()
    {
        return [
            'kode_allowance' => [
                'string',
                'max:10',
                'required',
                'unique:deductions',
            ],
            'allowance'      => [
                'string',
                'required',
                'unique:deductions',
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
