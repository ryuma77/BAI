<?php

namespace App\Http\Requests;

use App\Models\Pengajuancuti;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePengajuancutiRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('pengajuancuti_create');
    }

    public function rules()
    {
        return [
            'nik_id'        => [
                'required',
                'integer',
            ],
            'nama_id'       => [
                'required',
                'integer',
            ],
            'jenis_cuti_id' => [
                'required',
                'integer',
            ],
            'tanggal_cuti'  => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'lama_cuti'     => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'sisa_cuti'     => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
