<?php

namespace App\Http\Requests;

use App\Models\InputAbsenManual;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyInputAbsenManualRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('input_absen_manual_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:input_absen_manuals,id',
        ];
    }
}
