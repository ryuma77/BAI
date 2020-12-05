<?php

namespace App\Http\Requests;

use App\Models\JenisCuti;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateJenisCutiRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('jenis_cuti_edit');
    }

    public function rules()
    {
        return [
            'kode_cuti'     => [
                'string',
                'required',
                'unique:jenis_cutis,kode_cuti,' . request()->route('jenis_cuti')->id,
            ],
            'jenis_cuti'    => [
                'string',
                'required',
                'unique:jenis_cutis,jenis_cuti,' . request()->route('jenis_cuti')->id,
            ],
            'maks_pertahun' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'keterangan'    => [
                'string',
                'nullable',
            ],
        ];
    }
}
