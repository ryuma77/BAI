<?php

namespace App\Http\Requests;

use App\Models\LiburNasional;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateLiburNasionalRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('libur_nasional_edit');
    }

    public function rules()
    {
        return [
            'tanggal'    => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'keterangan' => [
                'string',
                'nullable',
            ],
        ];
    }
}
