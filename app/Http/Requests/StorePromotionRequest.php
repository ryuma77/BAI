<?php

namespace App\Http\Requests;

use App\Models\Promotion;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePromotionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('promotion_create');
    }

    public function rules()
    {
        return [
            'employee_name_id'   => [
                'required',
                'integer',
            ],
            'department_from_id' => [
                'required',
                'integer',
            ],
            'level_from_id'      => [
                'required',
                'integer',
            ],
            'position_from_id'   => [
                'required',
                'integer',
            ],
        ];
    }
}
