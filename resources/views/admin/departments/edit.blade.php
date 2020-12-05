@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.department.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.departments.update", [$department->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="department_name">{{ trans('cruds.department.fields.department_name') }}</label>
                <input class="form-control {{ $errors->has('department_name') ? 'is-invalid' : '' }}" type="text" name="department_name" id="department_name" value="{{ old('department_name', $department->department_name) }}" required>
                @if($errors->has('department_name'))
                    <span class="text-danger">{{ $errors->first('department_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.department.fields.department_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="department_code">{{ trans('cruds.department.fields.department_code') }}</label>
                <input class="form-control {{ $errors->has('department_code') ? 'is-invalid' : '' }}" type="text" name="department_code" id="department_code" value="{{ old('department_code', $department->department_code) }}" required>
                @if($errors->has('department_code'))
                    <span class="text-danger">{{ $errors->first('department_code') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.department.fields.department_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="division_name_id">{{ trans('cruds.department.fields.division_name') }}</label>
                <select class="form-control select2 {{ $errors->has('division_name') ? 'is-invalid' : '' }}" name="division_name_id" id="division_name_id" required>
                    @foreach($division_names as $id => $division_name)
                        <option value="{{ $id }}" {{ (old('division_name_id') ? old('division_name_id') : $department->division_name->id ?? '') == $id ? 'selected' : '' }}>{{ $division_name }}</option>
                    @endforeach
                </select>
                @if($errors->has('division_name'))
                    <span class="text-danger">{{ $errors->first('division_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.department.fields.division_name_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection