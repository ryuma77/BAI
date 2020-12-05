@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.rotation.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.rotations.update", [$rotation->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="employee_name_id">{{ trans('cruds.rotation.fields.employee_name') }}</label>
                <select class="form-control select2 {{ $errors->has('employee_name') ? 'is-invalid' : '' }}" name="employee_name_id" id="employee_name_id">
                    @foreach($employee_names as $id => $employee_name)
                        <option value="{{ $id }}" {{ (old('employee_name_id') ? old('employee_name_id') : $rotation->employee_name->id ?? '') == $id ? 'selected' : '' }}>{{ $employee_name }}</option>
                    @endforeach
                </select>
                @if($errors->has('employee_name'))
                    <span class="text-danger">{{ $errors->first('employee_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.rotation.fields.employee_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="department_from_id">{{ trans('cruds.rotation.fields.department_from') }}</label>
                <select class="form-control select2 {{ $errors->has('department_from') ? 'is-invalid' : '' }}" name="department_from_id" id="department_from_id">
                    @foreach($department_froms as $id => $department_from)
                        <option value="{{ $id }}" {{ (old('department_from_id') ? old('department_from_id') : $rotation->department_from->id ?? '') == $id ? 'selected' : '' }}>{{ $department_from }}</option>
                    @endforeach
                </select>
                @if($errors->has('department_from'))
                    <span class="text-danger">{{ $errors->first('department_from') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.rotation.fields.department_from_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="department_to_id">{{ trans('cruds.rotation.fields.department_to') }}</label>
                <select class="form-control select2 {{ $errors->has('department_to') ? 'is-invalid' : '' }}" name="department_to_id" id="department_to_id">
                    @foreach($department_tos as $id => $department_to)
                        <option value="{{ $id }}" {{ (old('department_to_id') ? old('department_to_id') : $rotation->department_to->id ?? '') == $id ? 'selected' : '' }}>{{ $department_to }}</option>
                    @endforeach
                </select>
                @if($errors->has('department_to'))
                    <span class="text-danger">{{ $errors->first('department_to') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.rotation.fields.department_to_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="valid_date">{{ trans('cruds.rotation.fields.valid_date') }}</label>
                <input class="form-control date {{ $errors->has('valid_date') ? 'is-invalid' : '' }}" type="text" name="valid_date" id="valid_date" value="{{ old('valid_date', $rotation->valid_date) }}">
                @if($errors->has('valid_date'))
                    <span class="text-danger">{{ $errors->first('valid_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.rotation.fields.valid_date_helper') }}</span>
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