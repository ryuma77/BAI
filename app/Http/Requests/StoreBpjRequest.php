<?php

namespace App\Http\Requests;

use App\Models\Bpj;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBpjRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('bpj_create');
    }

    public function rules()
    {
        return [
            'jenis_program' => [
                'required',
            ],
            'perusahaan'    => [
                'numeric',
                'required',
            ],
            'karyawan'      => [
                'numeric',
                'required',
            ],
        ];
    }
}
