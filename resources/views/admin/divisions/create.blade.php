@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.division.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.divisions.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="division_code">{{ trans('cruds.division.fields.division_code') }}</label>
                <input class="form-control {{ $errors->has('division_code') ? 'is-invalid' : '' }}" type="text" name="division_code" id="division_code" value="{{ old('division_code', '') }}" required>
                @if($errors->has('division_code'))
                    <span class="text-danger">{{ $errors->first('division_code') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.division.fields.division_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="division_name">{{ trans('cruds.division.fields.division_name') }}</label>
                <input class="form-control {{ $errors->has('division_name') ? 'is-invalid' : '' }}" type="text" name="division_name" id="division_name" value="{{ old('division_name', '') }}" required>
                @if($errors->has('division_name'))
                    <span class="text-danger">{{ $errors->first('division_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.division.fields.division_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="business_unit_id">{{ trans('cruds.division.fields.business_unit') }}</label>
                <select class="form-control select2 {{ $errors->has('business_unit') ? 'is-invalid' : '' }}" name="business_unit_id" id="business_unit_id" required>
                    @foreach($business_units as $id => $business_unit)
                        <option value="{{ $id }}" {{ old('business_unit_id') == $id ? 'selected' : '' }}>{{ $business_unit }}</option>
                    @endforeach
                </select>
                @if($errors->has('business_unit'))
                    <span class="text-danger">{{ $errors->first('business_unit') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.division.fields.business_unit_helper') }}</span>
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