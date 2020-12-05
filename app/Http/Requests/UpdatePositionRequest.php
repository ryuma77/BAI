<?php

namespace App\Http\Requests;

use App\Models\Position;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePositionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('position_edit');
    }

    public function rules()
    {
        return [
            'position_name' => [
                'string',
                'required',
                'unique:positions,position_name,' . request()->route('position')->id,
            ],
            'kode_jabatan'  => [
                'string',
                'max:10',
                'required',
                'unique:positions,kode_jabatan,' . request()->route('position')->id,
            ],
        ];
    }
}
