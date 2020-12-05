<?php

namespace App\Http\Requests;

use App\Models\Division;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDivisionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('division_edit');
    }

    public function rules()
    {
        return [
            'division_code'    => [
                'string',
                'required',
                'unique:divisions,division_code,' . request()->route('division')->id,
            ],
            'division_name'    => [
                'string',
                'required',
                'unique:divisions,division_name,' . request()->route('division')->id,
            ],
            'business_unit_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
