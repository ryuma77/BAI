@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.rotation.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.rotations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.rotation.fields.id') }}
                        </th>
                        <td>
                            {{ $rotation->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rotation.fields.employee_name') }}
                        </th>
                        <td>
                            {{ $rotation->employee_name->nama ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rotation.fields.department_from') }}
                        </th>
                        <td>
                            {{ $rotation->department_from->department_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rotation.fields.department_to') }}
                        </th>
                        <td>
                            {{ $rotation->department_to->department_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rotation.fields.valid_date') }}
                        </th>
                        <td>
                            {{ $rotation->valid_date }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.rotations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection