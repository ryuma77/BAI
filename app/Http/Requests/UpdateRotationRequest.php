<?php

namespace App\Http\Requests;

use App\Models\Rotation;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateRotationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('rotation_edit');
    }

    public function rules()
    {
        return [
            'valid_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
