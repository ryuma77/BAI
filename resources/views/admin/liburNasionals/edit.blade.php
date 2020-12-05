@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.liburNasional.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.libur-nasionals.update", [$liburNasional->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="tanggal">{{ trans('cruds.liburNasional.fields.tanggal') }}</label>
                <input class="form-control date {{ $errors->has('tanggal') ? 'is-invalid' : '' }}" type="text" name="tanggal" id="tanggal" value="{{ old('tanggal', $liburNasional->tanggal) }}" required>
                @if($errors->has('tanggal'))
                    <span class="text-danger">{{ $errors->first('tanggal') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.liburNasional.fields.tanggal_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="keterangan">{{ trans('cruds.liburNasional.fields.keterangan') }}</label>
                <input class="form-control {{ $errors->has('keterangan') ? 'is-invalid' : '' }}" type="text" name="keterangan" id="keterangan" value="{{ old('keterangan', $liburNasional->keterangan) }}">
                @if($errors->has('keterangan'))
                    <span class="text-danger">{{ $errors->first('keterangan') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.liburNasional.fields.keterangan_helper') }}</span>
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