<?php

namespace App\Http\Requests;

use App\Models\InputAbsenManual;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateInputAbsenManualRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('input_absen_manual_edit');
    }

    public function rules()
    {
        return [
            'ip_address' => [
                'string',
                'required',
                'unique:input_absen_manuals,ip_address,' . request()->route('input_absen_manual')->id,
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
