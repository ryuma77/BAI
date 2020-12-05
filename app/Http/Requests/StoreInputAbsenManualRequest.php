<?php

namespace App\Http\Requests;

use App\Models\InputAbsenManual;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreInputAbsenManualRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('input_absen_manual_create');
    }

    public function rules()
    {
        return [
            'ip_address' => [
                'string',
                'required',
                'unique:input_absen_manuals',
            ],
            'nik_id'     => [
                'required',
                'integer',
            ],
            'tanggal'    => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'jam_masuk'  => [
                'required',
                'date_format:' . config('panel.time_format'),
            ],
            'jam_keluar' => [
                'required',
                'date_format:' . config('panel.time_format'),
            ],
        ];
    }
}
