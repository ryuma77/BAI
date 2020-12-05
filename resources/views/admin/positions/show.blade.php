@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.position.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.positions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.position.fields.id') }}
                        </th>
                        <td>
                            {{ $position->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.position.fields.position_name') }}
                        </th>
                        <td>
                            {{ $position->position_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.position.fields.kode_jabatan') }}
                        </th>
                        <td>
                            {{ $position->kode_jabatan }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.positions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#position_employees" role="tab" data-toggle="tab">
                {{ trans('cruds.employee.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#position_jobdescs" role="tab" data-toggle="tab">
                {{ trans('cruds.jobdesc.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="position_employees">
            @includeIf('admin.positions.relationships.positionEmployees', ['employees' => $position->positionEmployees])
        </div>
        <div class="tab-pane" role="tabpanel" id="position_jobdescs">
            @includeIf('admin.positions.relationships.positionJobdescs', ['jobdescs' => $position->positionJobdescs])
        </div>
    </div>
</div>

@endsection