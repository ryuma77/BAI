<?php

namespace App\Http\Requests;

use App\Models\Jadwal;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreJadwalRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('jadwal_create');
    }

    public function rules()
    {
        return [
            'tanggal_awal'   => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'tanggal_akhir'  => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'departement_id' => [
                'required',
                'integer',
            ],
            'jam_masuk'      => [
                'required',
                'date_format:' . config('panel.time_format'),
            ],
            'jam_pulang'     => [
                'required',
                'date_format:' . config('panel.time_format'),
            ],
        ];
    }
}
