@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.jenisCuti.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.jenis-cutis.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="kode_cuti">{{ trans('cruds.jenisCuti.fields.kode_cuti') }}</label>
                <input class="form-control {{ $errors->has('kode_cuti') ? 'is-invalid' : '' }}" type="text" name="kode_cuti" id="kode_cuti" value="{{ old('kode_cuti', '') }}" required>
                @if($errors->has('kode_cuti'))
                    <span class="text-danger">{{ $errors->first('kode_cuti') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.jenisCuti.fields.kode_cuti_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="jenis_cuti">{{ trans('cruds.jenisCuti.fields.jenis_cuti') }}</label>
                <input class="form-control {{ $errors->has('jenis_cuti') ? 'is-invalid' : '' }}" type="text" name="jenis_cuti" id="jenis_cuti" value="{{ old('jenis_cuti', '') }}" required>
                @if($errors->has('jenis_cuti'))
                    <span class="text-danger">{{ $errors->first('jenis_cuti') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.jenisCuti.fields.jenis_cuti_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="maks_pertahun">{{ trans('cruds.jenisCuti.fields.maks_pertahun') }}</label>
                <input class="form-control {{ $errors->has('maks_pertahun') ? 'is-invalid' : '' }}" type="number" name="maks_pertahun" id="maks_pertahun" value="{{ old('maks_pertahun', '') }}" step="1">
                @if($errors->has('maks_pertahun'))
                    <span class="text-danger">{{ $errors->first('maks_pertahun') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.jenisCuti.fields.maks_pertahun_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="keterangan">{{ trans('cruds.jenisCuti.fields.keterangan') }}</label>
                <input class="form-control {{ $errors->has('keterangan') ? 'is-invalid' : '' }}" type="text" name="keterangan" id="keterangan" value="{{ old('keterangan', '') }}">
                @if($errors->has('keterangan'))
                    <span class="text-danger">{{ $errors->first('keterangan') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.jenisCuti.fields.keterangan_helper') }}</span>
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