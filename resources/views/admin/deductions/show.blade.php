@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.deduction.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.deductions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.deduction.fields.id') }}
                        </th>
                        <td>
                            {{ $deduction->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.deduction.fields.kode_allowance') }}
                        </th>
                        <td>
                            {{ $deduction->kode_allowance }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.deduction.fields.allowance') }}
                        </th>
                        <td>
                            {{ $deduction->allowance }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.deduction.fields.allowance_type') }}
                        </th>
                        <td>
                            {{ App\Models\Deduction::ALLOWANCE_TYPE_SELECT[$deduction->allowance_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.deduction.fields.nilai') }}
                        </th>
                        <td>
                            {{ $deduction->nilai }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.deduction.fields.keterangan') }}
                        </th>
                        <td>
                            {{ $deduction->keterangan }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.deductions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection