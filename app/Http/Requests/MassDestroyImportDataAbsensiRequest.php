<?php

namespace App\Http\Requests;

use App\Models\ImportDataAbsensi;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyImportDataAbsensiRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('import_data_absensi_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:import_data_absensis,id',
        ];
    }
}
