@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.bpj.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.bpjs.update", [$bpj->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required">{{ trans('cruds.bpj.fields.jenis_program') }}</label>
                <select class="form-control {{ $errors->has('jenis_program') ? 'is-invalid' : '' }}" name="jenis_program" id="jenis_program" required>
                    <option value disabled {{ old('jenis_program', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Bpj::JENIS_PROGRAM_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('jenis_program', $bpj->jenis_program) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('jenis_program'))
                    <span class="text-danger">{{ $errors->first('jenis_program') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.bpj.fields.jenis_program_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="perusahaan">{{ trans('cruds.bpj.fields.perusahaan') }}</label>
                <input class="form-control {{ $errors->has('perusahaan') ? 'is-invalid' : '' }}" type="number" name="perusahaan" id="perusahaan" value="{{ old('perusahaan', $bpj->perusahaan) }}" step="0.01" required>
                @if($errors->has('perusahaan'))
                    <span class="text-danger">{{ $errors->first('perusahaan') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.bpj.fields.perusahaan_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="karyawan">{{ trans('cruds.bpj.fields.karyawan') }}</label>
                <input class="form-control {{ $errors->has('karyawan') ? 'is-invalid' : '' }}" type="number" name="karyawan" id="karyawan" value="{{ old('karyawan', $bpj->karyawan) }}" step="0.01" required>
                @if($errors->has('karyawan'))
                    <span class="text-danger">{{ $errors->first('karyawan') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.bpj.fields.karyawan_helper') }}</span>
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