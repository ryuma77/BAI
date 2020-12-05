@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.department.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.departments.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.department.fields.id') }}
                        </th>
                        <td>
                            {{ $department->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.department.fields.department_name') }}
                        </th>
                        <td>
                            {{ $department->department_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.department.fields.department_code') }}
                        </th>
                        <td>
                            {{ $department->department_code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.department.fields.division_name') }}
                        </th>
                        <td>
                            {{ $department->division_name->division_name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.departments.index') }}">
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
            <a class="nav-link" href="#department_name_sections" role="tab" data-toggle="tab">
                {{ trans('cruds.section.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#department_employees" role="tab" data-toggle="tab">
                {{ trans('cruds.employee.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#department_from_promotions" role="tab" data-toggle="tab">
                {{ trans('cruds.promotion.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="department_name_sections">
            @includeIf('admin.departments.relationships.departmentNameSections', ['sections' => $department->departmentNameSections])
        </div>
        <div class="tab-pane" role="tabpanel" id="department_employees">
            @includeIf('admin.departments.relationships.departmentEmployees', ['employees' => $department->departmentEmployees])
        </div>
        <div class="tab-pane" role="tabpanel" id="department_from_promotions">
            @includeIf('admin.departments.relationships.departmentFromPromotions', ['promotions' => $department->departmentFromPromotions])
        </div>
    </div>
</div>

@endsection