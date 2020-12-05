@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.lembur.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.lemburs.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="ip_address">{{ trans('cruds.lembur.fields.ip_address') }}</label>
                <input class="form-control {{ $errors->has('ip_address') ? 'is-invalid' : '' }}" type="text" name="ip_address" id="ip_address" value="{{ old('ip_address', '') }}" required>
                @if($errors->has('ip_address'))
                    <span class="text-danger">{{ $errors->first('ip_address') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.lembur.fields.ip_address_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nik_id">{{ trans('cruds.lembur.fields.nik') }}</label>
                <select class="form-control select2 {{ $errors->has('nik') ? 'is-invalid' : '' }}" name="nik_id" id="nik_id" required>
                    @foreach($niks as $id => $nik)
                        <option value="{{ $id }}" {{ old('nik_id') == $id ? 'selected' : '' }}>{{ $nik }}</option>
                    @endforeach
                </select>
                @if($errors->has('nik'))
                    <span class="text-danger">{{ $errors->first('nik') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.lembur.fields.nik_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="tanggal">{{ trans('cruds.lembur.fields.tanggal') }}</label>
                <input class="form-control date {{ $errors->has('tanggal') ? 'is-invalid' : '' }}" type="text" name="tanggal" id="tanggal" value="{{ old('tanggal') }}" required>
                @if($errors->has('tanggal'))
                    <span class="text-danger">{{ $errors->first('tanggal') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.lembur.fields.tanggal_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="jam_lembur">{{ trans('cruds.lembur.fields.jam_lembur') }}</label>
                <input class="form-control {{ $errors->has('jam_lembur') ? 'is-invalid' : '' }}" type="number" name="jam_lembur" id="jam_lembur" value="{{ old('jam_lembur', '') }}" step="1" required>
                @if($errors->has('jam_lembur'))
                    <span class="text-danger">{{ $errors->first('jam_lembur') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.lembur.fields.jam_lembur_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="keterangan">{{ trans('cruds.lembur.fields.keterangan') }}</label>
                <input class="form-control {{ $errors->has('keterangan') ? 'is-invalid' : '' }}" type="text" name="keterangan" id="keterangan" value="{{ old('keterangan', '') }}">
                @if($errors->has('keterangan'))
                    <span class="text-danger">{{ $errors->first('keterangan') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.lembur.fields.keterangan_helper') }}</span>
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