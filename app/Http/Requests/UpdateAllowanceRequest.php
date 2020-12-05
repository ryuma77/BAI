<?php

namespace App\Http\Requests;

use App\Models\Allowance;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAllowanceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('allowance_edit');
    }

    public function rules()
    {
        return [
            'kode_allowance' => [
                'string',
                'max:10',
                'required',
                'unique:allowances,kode_allowance,' . request()->route('allowance')->id,
            ],
            'allowance'      => [
                'string',
                'required',
                'unique:allowances,allowance,' . request()->route('allowance')->id,
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
