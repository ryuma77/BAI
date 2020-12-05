@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.position.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.positions.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="position_name">{{ trans('cruds.position.fields.position_name') }}</label>
                <input class="form-control {{ $errors->has('position_name') ? 'is-invalid' : '' }}" type="text" name="position_name" id="position_name" value="{{ old('position_name', '') }}" required>
                @if($errors->has('position_name'))
                    <span class="text-danger">{{ $errors->first('position_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.position.fields.position_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="kode_jabatan">{{ trans('cruds.position.fields.kode_jabatan') }}</label>
                <input class="form-control {{ $errors->has('kode_jabatan') ? 'is-invalid' : '' }}" type="text" name="kode_jabatan" id="kode_jabatan" value="{{ old('kode_jabatan', '') }}" required>
                @if($errors->has('kode_jabatan'))
                    <span class="text-danger">{{ $errors->first('kode_jabatan') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.position.fields.kode_jabatan_helper') }}</span>
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