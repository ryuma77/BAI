@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.division.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.divisions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.division.fields.division_code') }}
                        </th>
                        <td>
                            {{ $division->division_code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.division.fields.division_name') }}
                        </th>
                        <td>
                            {{ $division->division_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.division.fields.business_unit') }}
                        </th>
                        <td>
                            {{ $division->business_unit->business_unit_name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.divisions.index') }}">
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
            <a class="nav-link" href="#division_name_departments" role="tab" data-toggle="tab">
                {{ trans('cruds.department.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#division_employees" role="tab" data-toggle="tab">
                {{ trans('cruds.employee.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="division_name_departments">
            @includeIf('admin.divisions.relationships.divisionNameDepartments', ['departments' => $division->divisionNameDepartments])
        </div>
        <div class="tab-pane" role="tabpanel" id="division_employees">
            @includeIf('admin.divisions.relationships.divisionEmployees', ['employees' => $division->divisionEmployees])
        </div>
    </div>
</div>

@endsection