@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.promotion.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.promotions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.promotion.fields.id') }}
                        </th>
                        <td>
                            {{ $promotion->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.promotion.fields.employee_name') }}
                        </th>
                        <td>
                            {{ $promotion->employee_name->nama ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.promotion.fields.department_from') }}
                        </th>
                        <td>
                            {{ $promotion->department_from->department_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.promotion.fields.level_from') }}
                        </th>
                        <td>
                            {{ $promotion->level_from->level_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.promotion.fields.position_from') }}
                        </th>
                        <td>
                            {{ $promotion->position_from->position_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.promotion.fields.level_to') }}
                        </th>
                        <td>
                            {{ $promotion->level_to->level_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.promotion.fields.position_to') }}
                        </th>
                        <td>
                            {{ $promotion->position_to->position_name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.promotions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection