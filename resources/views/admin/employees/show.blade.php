@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.employee.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.employees.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.employee.fields.id') }}
                        </th>
                        <td>
                            {{ $employee->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employee.fields.nik') }}
                        </th>
                        <td>
                            {{ $employee->nik }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employee.fields.nama') }}
                        </th>
                        <td>
                            {{ $employee->nama }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employee.fields.tempat_lahir') }}
                        </th>
                        <td>
                            {{ $employee->tempat_lahir }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employee.fields.tanggal_lahir') }}
                        </th>
                        <td>
                            {{ $employee->tanggal_lahir }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employee.fields.jenis_kelamin') }}
                        </th>
                        <td>
                            {{ App\Models\Employee::JENIS_KELAMIN_SELECT[$employee->jenis_kelamin] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employee.fields.division') }}
                        </th>
                        <td>
                            {{ $employee->division->division_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employee.fields.department') }}
                        </th>
                        <td>
                            {{ $employee->department->department_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employee.fields.position') }}
                        </th>
                        <td>
                            {{ $employee->position->position_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employee.fields.marital_status') }}
                        </th>
                        <td>
                            {{ App\Models\Employee::MARITAL_STATUS_SELECT[$employee->marital_status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employee.fields.alamat') }}
                        </th>
                        <td>
                            {{ $employee->alamat }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employee.fields.kota') }}
                        </th>
                        <td>
                            {{ $employee->kota }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employee.fields.kode_pos') }}
                        </th>
                        <td>
                            {{ $employee->kode_pos }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employee.fields.employee_status') }}
                        </th>
                        <td>
                            {{ App\Models\Employee::EMPLOYEE_STATUS_SELECT[$employee->employee_status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employee.fields.resign') }}
                        </th>
                        <td>
                            {{ App\Models\Employee::RESIGN_SELECT[$employee->resign] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employee.fields.jpg') }}
                        </th>
                        <td>
                            @if($employee->jpg)
                                <a href="{{ $employee->jpg->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $employee->jpg->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.employees.index') }}">
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
            <a class="nav-link" href="#employee_salaries" role="tab" data-toggle="tab">
                {{ trans('cruds.salary.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#employee_name_employee_families" role="tab" data-toggle="tab">
                {{ trans('cruds.employeeFamily.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#employee_name_rotations" role="tab" data-toggle="tab">
                {{ trans('cruds.rotation.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#employee_name_promotions" role="tab" data-toggle="tab">
                {{ trans('cruds.promotion.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="employee_salaries">
            @includeIf('admin.employees.relationships.employeeSalaries', ['salaries' => $employee->employeeSalaries])
        </div>
        <div class="tab-pane" role="tabpanel" id="employee_name_employee_families">
            @includeIf('admin.employees.relationships.employeeNameEmployeeFamilies', ['employeeFamilies' => $employee->employeeNameEmployeeFamilies])
        </div>
        <div class="tab-pane" role="tabpanel" id="employee_name_rotations">
            @includeIf('admin.employees.relationships.employeeNameRotations', ['rotations' => $employee->employeeNameRotations])
        </div>
        <div class="tab-pane" role="tabpanel" id="employee_name_promotions">
            @includeIf('admin.employees.relationships.employeeNamePromotions', ['promotions' => $employee->employeeNamePromotions])
        </div>
    </div>
</div>

@endsection