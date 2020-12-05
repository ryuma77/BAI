<?php

namespace App\Http\Requests;

use App\Models\ImportDataAbsensi;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreImportDataAbsensiRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('import_data_absensi_create');
    }

    public function rules()
    {
        return [
            'tanggal'    => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'jam_masuk'  => [
                'date_format:' . config('panel.time_format'),
                'nullable',
            ],
            'jam_keluar' => [
                'date_format:' . config('panel.time_format'),
                'nullable',
            ],
        ];
    }
}
