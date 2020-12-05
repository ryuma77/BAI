@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.businessUnit.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.business-units.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.businessUnit.fields.business_unit_code') }}
                        </th>
                        <td>
                            {{ $businessUnit->business_unit_code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.businessUnit.fields.business_unit_name') }}
                        </th>
                        <td>
                            {{ $businessUnit->business_unit_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.businessUnit.fields.lokasi') }}
                        </th>
                        <td>
                            {{ $businessUnit->lokasi }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.business-units.index') }}">
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
            <a class="nav-link" href="#business_unit_divisions" role="tab" data-toggle="tab">
                {{ trans('cruds.division.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="business_unit_divisions">
            @includeIf('admin.businessUnits.relationships.businessUnitDivisions', ['divisions' => $businessUnit->businessUnitDivisions])
        </div>
    </div>
</div>

@endsection