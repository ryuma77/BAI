@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.tarikDataabsen.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.tarik-dataabsens.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="ip_address">{{ trans('cruds.tarikDataabsen.fields.ip_address') }}</label>
                <input class="form-control {{ $errors->has('ip_address') ? 'is-invalid' : '' }}" type="text" name="ip_address" id="ip_address" value="{{ old('ip_address', '') }}" required>
                @if($errors->has('ip_address'))
                    <span class="text-danger">{{ $errors->first('ip_address') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tarikDataabsen.fields.ip_address_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nik_id">{{ trans('cruds.tarikDataabsen.fields.nik') }}</label>
                <select class="form-control select2 {{ $errors->has('nik') ? 'is-invalid' : '' }}" name="nik_id" id="nik_id" required>
                    @foreach($niks as $id => $nik)
                        <option value="{{ $id }}" {{ old('nik_id') == $id ? 'selected' : '' }}>{{ $nik }}</option>
                    @endforeach
                </select>
                @if($errors->has('nik'))
                    <span class="text-danger">{{ $errors->first('nik') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tarikDataabsen.fields.nik_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="tanggal">{{ trans('cruds.tarikDataabsen.fields.tanggal') }}</label>
                <input class="form-control date {{ $errors->has('tanggal') ? 'is-invalid' : '' }}" type="text" name="tanggal" id="tanggal" value="{{ old('tanggal') }}" required>
                @if($errors->has('tanggal'))
                    <span class="text-danger">{{ $errors->first('tanggal') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tarikDataabsen.fields.tanggal_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="jam_masuk">{{ trans('cruds.tarikDataabsen.fields.jam_masuk') }}</label>
                <input class="form-control timepicker {{ $errors->has('jam_masuk') ? 'is-invalid' : '' }}" type="text" name="jam_masuk" id="jam_masuk" value="{{ old('jam_masuk') }}" required>
                @if($errors->has('jam_masuk'))
                    <span class="text-danger">{{ $errors->first('jam_masuk') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tarikDataabsen.fields.jam_masuk_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="jam_keluar">{{ trans('cruds.tarikDataabsen.fields.jam_keluar') }}</label>
                <input class="form-control timepicker {{ $errors->has('jam_keluar') ? 'is-invalid' : '' }}" type="text" name="jam_keluar" id="jam_keluar" value="{{ old('jam_keluar') }}" required>
                @if($errors->has('jam_keluar'))
                    <span class="text-danger">{{ $errors->first('jam_keluar') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tarikDataabsen.fields.jam_keluar_helper') }}</span>
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