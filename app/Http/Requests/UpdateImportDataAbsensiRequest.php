<?php

namespace App\Http\Requests;

use App\Models\ImportDataAbsensi;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateImportDataAbsensiRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('import_data_absensi_edit');
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
