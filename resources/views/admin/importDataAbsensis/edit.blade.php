@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.importDataAbsensi.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.import-data-absensis.update", [$importDataAbsensi->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="nik_id">{{ trans('cruds.importDataAbsensi.fields.nik') }}</label>
                <select class="form-control select2 {{ $errors->has('nik') ? 'is-invalid' : '' }}" name="nik_id" id="nik_id">
                    @foreach($niks as $id => $nik)
                        <option value="{{ $id }}" {{ (old('nik_id') ? old('nik_id') : $importDataAbsensi->nik->id ?? '') == $id ? 'selected' : '' }}>{{ $nik }}</option>
                    @endforeach
                </select>
                @if($errors->has('nik'))
                    <span class="text-danger">{{ $errors->first('nik') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.importDataAbsensi.fields.nik_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tanggal">{{ trans('cruds.importDataAbsensi.fields.tanggal') }}</label>
                <input class="form-control date {{ $errors->has('tanggal') ? 'is-invalid' : '' }}" type="text" name="tanggal" id="tanggal" value="{{ old('tanggal', $importDataAbsensi->tanggal) }}">
                @if($errors->has('tanggal'))
                    <span class="text-danger">{{ $errors->first('tanggal') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.importDataAbsensi.fields.tanggal_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="jam_masuk">{{ trans('cruds.importDataAbsensi.fields.jam_masuk') }}</label>
                <input class="form-control timepicker {{ $errors->has('jam_masuk') ? 'is-invalid' : '' }}" type="text" name="jam_masuk" id="jam_masuk" value="{{ old('jam_masuk', $importDataAbsensi->jam_masuk) }}">
                @if($errors->has('jam_masuk'))
                    <span class="text-danger">{{ $errors->first('jam_masuk') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.importDataAbsensi.fields.jam_masuk_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="jam_keluar">{{ trans('cruds.importDataAbsensi.fields.jam_keluar') }}</label>
                <input class="form-control timepicker {{ $errors->has('jam_keluar') ? 'is-invalid' : '' }}" type="text" name="jam_keluar" id="jam_keluar" value="{{ old('jam_keluar', $importDataAbsensi->jam_keluar) }}">
                @if($errors->has('jam_keluar'))
                    <span class="text-danger">{{ $errors->first('jam_keluar') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.importDataAbsensi.fields.jam_keluar_helper') }}</span>
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