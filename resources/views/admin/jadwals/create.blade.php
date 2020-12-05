@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.jadwal.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.jadwals.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="tanggal_awal">{{ trans('cruds.jadwal.fields.tanggal_awal') }}</label>
                <input class="form-control date {{ $errors->has('tanggal_awal') ? 'is-invalid' : '' }}" type="text" name="tanggal_awal" id="tanggal_awal" value="{{ old('tanggal_awal') }}" required>
                @if($errors->has('tanggal_awal'))
                    <span class="text-danger">{{ $errors->first('tanggal_awal') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.jadwal.fields.tanggal_awal_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="tanggal_akhir">{{ trans('cruds.jadwal.fields.tanggal_akhir') }}</label>
                <input class="form-control date {{ $errors->has('tanggal_akhir') ? 'is-invalid' : '' }}" type="text" name="tanggal_akhir" id="tanggal_akhir" value="{{ old('tanggal_akhir') }}" required>
                @if($errors->has('tanggal_akhir'))
                    <span class="text-danger">{{ $errors->first('tanggal_akhir') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.jadwal.fields.tanggal_akhir_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="departement_id">{{ trans('cruds.jadwal.fields.departement') }}</label>
                <select class="form-control select2 {{ $errors->has('departement') ? 'is-invalid' : '' }}" name="departement_id" id="departement_id" required>
                    @foreach($departements as $id => $departement)
                        <option value="{{ $id }}" {{ old('departement_id') == $id ? 'selected' : '' }}>{{ $departement }}</option>
                    @endforeach
                </select>
                @if($errors->has('departement'))
                    <span class="text-danger">{{ $errors->first('departement') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.jadwal.fields.departement_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="bagian_id">{{ trans('cruds.jadwal.fields.bagian') }}</label>
                <select class="form-control select2 {{ $errors->has('bagian') ? 'is-invalid' : '' }}" name="bagian_id" id="bagian_id">
                    @foreach($bagians as $id => $bagian)
                        <option value="{{ $id }}" {{ old('bagian_id') == $id ? 'selected' : '' }}>{{ $bagian }}</option>
                    @endforeach
                </select>
                @if($errors->has('bagian'))
                    <span class="text-danger">{{ $errors->first('bagian') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.jadwal.fields.bagian_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="jam_masuk">{{ trans('cruds.jadwal.fields.jam_masuk') }}</label>
                <input class="form-control timepicker {{ $errors->has('jam_masuk') ? 'is-invalid' : '' }}" type="text" name="jam_masuk" id="jam_masuk" value="{{ old('jam_masuk') }}" required>
                @if($errors->has('jam_masuk'))
                    <span class="text-danger">{{ $errors->first('jam_masuk') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.jadwal.fields.jam_masuk_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="jam_pulang">{{ trans('cruds.jadwal.fields.jam_pulang') }}</label>
                <input class="form-control timepicker {{ $errors->has('jam_pulang') ? 'is-invalid' : '' }}" type="text" name="jam_pulang" id="jam_pulang" value="{{ old('jam_pulang') }}" required>
                @if($errors->has('jam_pulang'))
                    <span class="text-danger">{{ $errors->first('jam_pulang') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.jadwal.fields.jam_pulang_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.jadwal.fields.kategori_jadwal') }}</label>
                <select class="form-control {{ $errors->has('kategori_jadwal') ? 'is-invalid' : '' }}" name="kategori_jadwal" id="kategori_jadwal">
                    <option value disabled {{ old('kategori_jadwal', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Jadwal::KATEGORI_JADWAL_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('kategori_jadwal', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('kategori_jadwal'))
                    <span class="text-danger">{{ $errors->first('kategori_jadwal') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.jadwal.fields.kategori_jadwal_helper') }}</span>
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