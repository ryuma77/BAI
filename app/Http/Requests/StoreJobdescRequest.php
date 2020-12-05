<?php

namespace App\Http\Requests;

use App\Models\Jobdesc;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreJobdescRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('jobdesc_create');
    }

    public function rules()
    {
        return [
            'department_id' => [
                'required',
                'integer',
            ],
            'position_id'   => [
                'required',
                'integer',
            ],
            'level_id'      => [
                'required',
                'integer',
            ],
            'jobdesc'       => [
                'string',
                'required',
            ],
        ];
    }
}
