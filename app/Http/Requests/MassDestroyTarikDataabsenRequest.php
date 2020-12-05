<?php

namespace App\Http\Requests;

use App\Models\TarikDataabsen;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTarikDataabsenRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('tarik_dataabsen_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:tarik_dataabsens,id',
        ];
    }
}
