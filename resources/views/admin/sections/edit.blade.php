@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.section.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.sections.update", [$section->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="section_code">{{ trans('cruds.section.fields.section_code') }}</label>
                <input class="form-control {{ $errors->has('section_code') ? 'is-invalid' : '' }}" type="text" name="section_code" id="section_code" value="{{ old('section_code', $section->section_code) }}" required>
                @if($errors->has('section_code'))
                    <span class="text-danger">{{ $errors->first('section_code') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.section.fields.section_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="section_name">{{ trans('cruds.section.fields.section_name') }}</label>
                <input class="form-control {{ $errors->has('section_name') ? 'is-invalid' : '' }}" type="text" name="section_name" id="section_name" value="{{ old('section_name', $section->section_name) }}" required>
                @if($errors->has('section_name'))
                    <span class="text-danger">{{ $errors->first('section_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.section.fields.section_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="department_name_id">{{ trans('cruds.section.fields.department_name') }}</label>
                <select class="form-control select2 {{ $errors->has('department_name') ? 'is-invalid' : '' }}" name="department_name_id" id="department_name_id" required>
                    @foreach($department_names as $id => $department_name)
                        <option value="{{ $id }}" {{ (old('department_name_id') ? old('department_name_id') : $section->department_name->id ?? '') == $id ? 'selected' : '' }}>{{ $department_name }}</option>
                    @endforeach
                </select>
                @if($errors->has('department_name'))
                    <span class="text-danger">{{ $errors->first('department_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.section.fields.department_name_helper') }}</span>
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