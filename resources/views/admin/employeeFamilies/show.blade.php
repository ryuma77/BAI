@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.employeeFamily.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.employee-families.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.employeeFamily.fields.id') }}
                        </th>
                        <td>
                            {{ $employeeFamily->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employeeFamily.fields.employee_name') }}
                        </th>
                        <td>
                            {{ $employeeFamily->employee_name->nama ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employeeFamily.fields.family_name') }}
                        </th>
                        <td>
                            {{ $employeeFamily->family_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employeeFamily.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\EmployeeFamily::STATUS_SELECT[$employeeFamily->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employeeFamily.fields.keterangan') }}
                        </th>
                        <td>
                            {!! $employeeFamily->keterangan !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employeeFamily.fields.nik') }}
                        </th>
                        <td>
                            {{ $employeeFamily->nik->nik ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.employee-families.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection