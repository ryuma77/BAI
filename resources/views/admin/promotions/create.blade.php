@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.promotion.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.promotions.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="employee_name_id">{{ trans('cruds.promotion.fields.employee_name') }}</label>
                <select class="form-control select2 {{ $errors->has('employee_name') ? 'is-invalid' : '' }}" name="employee_name_id" id="employee_name_id" required>
                    @foreach($employee_names as $id => $employee_name)
                        <option value="{{ $id }}" {{ old('employee_name_id') == $id ? 'selected' : '' }}>{{ $employee_name }}</option>
                    @endforeach
                </select>
                @if($errors->has('employee_name'))
                    <span class="text-danger">{{ $errors->first('employee_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.promotion.fields.employee_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="department_from_id">{{ trans('cruds.promotion.fields.department_from') }}</label>
                <select class="form-control select2 {{ $errors->has('department_from') ? 'is-invalid' : '' }}" name="department_from_id" id="department_from_id" required>
                    @foreach($department_froms as $id => $department_from)
                        <option value="{{ $id }}" {{ old('department_from_id') == $id ? 'selected' : '' }}>{{ $department_from }}</option>
                    @endforeach
                </select>
                @if($errors->has('department_from'))
                    <span class="text-danger">{{ $errors->first('department_from') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.promotion.fields.department_from_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="level_from_id">{{ trans('cruds.promotion.fields.level_from') }}</label>
                <select class="form-control select2 {{ $errors->has('level_from') ? 'is-invalid' : '' }}" name="level_from_id" id="level_from_id" required>
                    @foreach($level_froms as $id => $level_from)
                        <option value="{{ $id }}" {{ old('level_from_id') == $id ? 'selected' : '' }}>{{ $level_from }}</option>
                    @endforeach
                </select>
                @if($errors->has('level_from'))
                    <span class="text-danger">{{ $errors->first('level_from') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.promotion.fields.level_from_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="position_from_id">{{ trans('cruds.promotion.fields.position_from') }}</label>
                <select class="form-control select2 {{ $errors->has('position_from') ? 'is-invalid' : '' }}" name="position_from_id" id="position_from_id" required>
                    @foreach($position_froms as $id => $position_from)
                        <option value="{{ $id }}" {{ old('position_from_id') == $id ? 'selected' : '' }}>{{ $position_from }}</option>
                    @endforeach
                </select>
                @if($errors->has('position_from'))
                    <span class="text-danger">{{ $errors->first('position_from') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.promotion.fields.position_from_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="level_to_id">{{ trans('cruds.promotion.fields.level_to') }}</label>
                <select class="form-control select2 {{ $errors->has('level_to') ? 'is-invalid' : '' }}" name="level_to_id" id="level_to_id">
                    @foreach($level_tos as $id => $level_to)
                        <option value="{{ $id }}" {{ old('level_to_id') == $id ? 'selected' : '' }}>{{ $level_to }}</option>
                    @endforeach
                </select>
                @if($errors->has('level_to'))
                    <span class="text-danger">{{ $errors->first('level_to') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.promotion.fields.level_to_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="position_to_id">{{ trans('cruds.promotion.fields.position_to') }}</label>
                <select class="form-control select2 {{ $errors->has('position_to') ? 'is-invalid' : '' }}" name="position_to_id" id="position_to_id">
                    @foreach($position_tos as $id => $position_to)
                        <option value="{{ $id }}" {{ old('position_to_id') == $id ? 'selected' : '' }}>{{ $position_to }}</option>
                    @endforeach
                </select>
                @if($errors->has('position_to'))
                    <span class="text-danger">{{ $errors->first('position_to') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.promotion.fields.position_to_helper') }}</span>
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