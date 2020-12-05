@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.level.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.levels.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="level_code">{{ trans('cruds.level.fields.level_code') }}</label>
                <input class="form-control {{ $errors->has('level_code') ? 'is-invalid' : '' }}" type="text" name="level_code" id="level_code" value="{{ old('level_code', '') }}" required>
                @if($errors->has('level_code'))
                    <span class="text-danger">{{ $errors->first('level_code') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.level.fields.level_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="level_name">{{ trans('cruds.level.fields.level_name') }}</label>
                <input class="form-control {{ $errors->has('level_name') ? 'is-invalid' : '' }}" type="text" name="level_name" id="level_name" value="{{ old('level_name', '') }}" required>
                @if($errors->has('level_name'))
                    <span class="text-danger">{{ $errors->first('level_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.level.fields.level_name_helper') }}</span>
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