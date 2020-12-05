<?php

namespace App\Http\Requests;

use App\Models\Allowance;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAllowanceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('allowance_create');
    }

    public function rules()
    {
        return [
            'kode_allowance' => [
                'string',
                'max:10',
                'required',
                'unique:allowances',
            ],
            'allowance'      => [
                'string',
                'required',
                'unique:allowances',
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
