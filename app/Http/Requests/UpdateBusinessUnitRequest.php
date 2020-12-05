<?php

namespace App\Http\Requests;

use App\Models\BusinessUnit;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBusinessUnitRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('business_unit_edit');
    }

    public function rules()
    {
        return [
            'business_unit_code' => [
                'string',
                'required',
                'unique:business_units,business_unit_code,' . request()->route('business_unit')->id,
            ],
            'business_unit_name' => [
                'string',
                'required',
                'unique:business_units,business_unit_name,' . request()->route('business_unit')->id,
            ],
            'lokasi'             => [
                'string',
                'nullable',
            ],
        ];
    }
}
