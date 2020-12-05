@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.businessUnit.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.business-units.update", [$businessUnit->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="business_unit_code">{{ trans('cruds.businessUnit.fields.business_unit_code') }}</label>
                <input class="form-control {{ $errors->has('business_unit_code') ? 'is-invalid' : '' }}" type="text" name="business_unit_code" id="business_unit_code" value="{{ old('business_unit_code', $businessUnit->business_unit_code) }}" required>
                @if($errors->has('business_unit_code'))
                    <span class="text-danger">{{ $errors->first('business_unit_code') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.businessUnit.fields.business_unit_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="business_unit_name">{{ trans('cruds.businessUnit.fields.business_unit_name') }}</label>
                <input class="form-control {{ $errors->has('business_unit_name') ? 'is-invalid' : '' }}" type="text" name="business_unit_name" id="business_unit_name" value="{{ old('business_unit_name', $businessUnit->business_unit_name) }}" required>
                @if($errors->has('business_unit_name'))
                    <span class="text-danger">{{ $errors->first('business_unit_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.businessUnit.fields.business_unit_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="lokasi">{{ trans('cruds.businessUnit.fields.lokasi') }}</label>
                <input class="form-control {{ $errors->has('lokasi') ? 'is-invalid' : '' }}" type="text" name="lokasi" id="lokasi" value="{{ old('lokasi', $businessUnit->lokasi) }}">
                @if($errors->has('lokasi'))
                    <span class="text-danger">{{ $errors->first('lokasi') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.businessUnit.fields.lokasi_helper') }}</span>
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