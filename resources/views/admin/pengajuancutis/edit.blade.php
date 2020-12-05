@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.pengajuancuti.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.pengajuancutis.update", [$pengajuancuti->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="nik_id">{{ trans('cruds.pengajuancuti.fields.nik') }}</label>
                <select class="form-control select2 {{ $errors->has('nik') ? 'is-invalid' : '' }}" name="nik_id" id="nik_id" required>
                    @foreach($niks as $id => $nik)
                        <option value="{{ $id }}" {{ (old('nik_id') ? old('nik_id') : $pengajuancuti->nik->id ?? '') == $id ? 'selected' : '' }}>{{ $nik }}</option>
                    @endforeach
                </select>
                @if($errors->has('nik'))
                    <span class="text-danger">{{ $errors->first('nik') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pengajuancuti.fields.nik_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nama_id">{{ trans('cruds.pengajuancuti.fields.nama') }}</label>
                <select class="form-control select2 {{ $errors->has('nama') ? 'is-invalid' : '' }}" name="nama_id" id="nama_id" required>
                    @foreach($namas as $id => $nama)
                        <option value="{{ $id }}" {{ (old('nama_id') ? old('nama_id') : $pengajuancuti->nama->id ?? '') == $id ? 'selected' : '' }}>{{ $nama }}</option>
                    @endforeach
                </select>
                @if($errors->has('nama'))
                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pengajuancuti.fields.nama_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="jenis_cuti_id">{{ trans('cruds.pengajuancuti.fields.jenis_cuti') }}</label>
                <select class="form-control select2 {{ $errors->has('jenis_cuti') ? 'is-invalid' : '' }}" name="jenis_cuti_id" id="jenis_cuti_id" required>
                    @foreach($jenis_cutis as $id => $jenis_cuti)
                        <option value="{{ $id }}" {{ (old('jenis_cuti_id') ? old('jenis_cuti_id') : $pengajuancuti->jenis_cuti->id ?? '') == $id ? 'selected' : '' }}>{{ $jenis_cuti }}</option>
                    @endforeach
                </select>
                @if($errors->has('jenis_cuti'))
                    <span class="text-danger">{{ $errors->first('jenis_cuti') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pengajuancuti.fields.jenis_cuti_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="tanggal_cuti">{{ trans('cruds.pengajuancuti.fields.tanggal_cuti') }}</label>
                <input class="form-control date {{ $errors->has('tanggal_cuti') ? 'is-invalid' : '' }}" type="text" name="tanggal_cuti" id="tanggal_cuti" value="{{ old('tanggal_cuti', $pengajuancuti->tanggal_cuti) }}" required>
                @if($errors->has('tanggal_cuti'))
                    <span class="text-danger">{{ $errors->first('tanggal_cuti') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pengajuancuti.fields.tanggal_cuti_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="lama_cuti">{{ trans('cruds.pengajuancuti.fields.lama_cuti') }}</label>
                <input class="form-control {{ $errors->has('lama_cuti') ? 'is-invalid' : '' }}" type="number" name="lama_cuti" id="lama_cuti" value="{{ old('lama_cuti', $pengajuancuti->lama_cuti) }}" step="1" required>
                @if($errors->has('lama_cuti'))
                    <span class="text-danger">{{ $errors->first('lama_cuti') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pengajuancuti.fields.lama_cuti_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sisa_cuti">{{ trans('cruds.pengajuancuti.fields.sisa_cuti') }}</label>
                <input class="form-control {{ $errors->has('sisa_cuti') ? 'is-invalid' : '' }}" type="number" name="sisa_cuti" id="sisa_cuti" value="{{ old('sisa_cuti', $pengajuancuti->sisa_cuti) }}" step="1">
                @if($errors->has('sisa_cuti'))
                    <span class="text-danger">{{ $errors->first('sisa_cuti') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pengajuancuti.fields.sisa_cuti_helper') }}</span>
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