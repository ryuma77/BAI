<?php

namespace App\Http\Requests;

use App\Models\TarikDataabsen;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTarikDataabsenRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('tarik_dataabsen_create');
    }

    public function rules()
    {
        return [
            'ip_address' => [
                'string',
                'required',
                'unique:tarik_dataabsens',
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
