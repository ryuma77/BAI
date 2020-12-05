@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.allowance.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.allowances.update", [$allowance->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="kode_allowance">{{ trans('cruds.allowance.fields.kode_allowance') }}</label>
                <input class="form-control {{ $errors->has('kode_allowance') ? 'is-invalid' : '' }}" type="text" name="kode_allowance" id="kode_allowance" value="{{ old('kode_allowance', $allowance->kode_allowance) }}" required>
                @if($errors->has('kode_allowance'))
                    <span class="text-danger">{{ $errors->first('kode_allowance') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.allowance.fields.kode_allowance_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="allowance">{{ trans('cruds.allowance.fields.allowance') }}</label>
                <input class="form-control {{ $errors->has('allowance') ? 'is-invalid' : '' }}" type="text" name="allowance" id="allowance" value="{{ old('allowance', $allowance->allowance) }}" required>
                @if($errors->has('allowance'))
                    <span class="text-danger">{{ $errors->first('allowance') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.allowance.fields.allowance_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.allowance.fields.allowance_type') }}</label>
                <select class="form-control {{ $errors->has('allowance_type') ? 'is-invalid' : '' }}" name="allowance_type" id="allowance_type" required>
                    <option value disabled {{ old('allowance_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Allowance::ALLOWANCE_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('allowance_type', $allowance->allowance_type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('allowance_type'))
                    <span class="text-danger">{{ $errors->first('allowance_type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.allowance.fields.allowance_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nilai">{{ trans('cruds.allowance.fields.nilai') }}</label>
                <input class="form-control {{ $errors->has('nilai') ? 'is-invalid' : '' }}" type="number" name="nilai" id="nilai" value="{{ old('nilai', $allowance->nilai) }}" step="0.01" required>
                @if($errors->has('nilai'))
                    <span class="text-danger">{{ $errors->first('nilai') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.allowance.fields.nilai_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="keterangan">{{ trans('cruds.allowance.fields.keterangan') }}</label>
                <input class="form-control {{ $errors->has('keterangan') ? 'is-invalid' : '' }}" type="text" name="keterangan" id="keterangan" value="{{ old('keterangan', $allowance->keterangan) }}">
                @if($errors->has('keterangan'))
                    <span class="text-danger">{{ $errors->first('keterangan') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.allowance.fields.keterangan_helper') }}</span>
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