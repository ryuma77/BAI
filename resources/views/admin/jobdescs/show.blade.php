@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.jobdesc.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.jobdescs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.jobdesc.fields.id') }}
                        </th>
                        <td>
                            {{ $jobdesc->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jobdesc.fields.department') }}
                        </th>
                        <td>
                            {{ $jobdesc->department->department_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jobdesc.fields.position') }}
                        </th>
                        <td>
                            {{ $jobdesc->position->position_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jobdesc.fields.level') }}
                        </th>
                        <td>
                            {{ $jobdesc->level->level_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jobdesc.fields.jobdesc') }}
                        </th>
                        <td>
                            {{ $jobdesc->jobdesc }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.jobdescs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection