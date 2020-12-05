<?php

namespace App\Http\Requests;

use App\Models\Lembur;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateLemburRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('lembur_edit');
    }

    public function rules()
    {
        return [
            'ip_address' => [
                'string',
                'required',
                'unique:lemburs,ip_address,' . request()->route('lembur')->id,
            ],
            'nik_id'     => [
                'required',
                'integer',
            ],
            'tanggal'    => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'jam_lembur' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'keterangan' => [
                'string',
                'nullable',
            ],
        ];
    }
}
