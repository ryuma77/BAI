@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.setting.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.settings.update", [$setting->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required">{{ trans('cruds.setting.fields.auto_cancel_cuti') }}</label>
                <select class="form-control {{ $errors->has('auto_cancel_cuti') ? 'is-invalid' : '' }}" name="auto_cancel_cuti" id="auto_cancel_cuti" required>
                    <option value disabled {{ old('auto_cancel_cuti', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Setting::AUTO_CANCEL_CUTI_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('auto_cancel_cuti', $setting->auto_cancel_cuti) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('auto_cancel_cuti'))
                    <span class="text-danger">{{ $errors->first('auto_cancel_cuti') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.auto_cancel_cuti_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.setting.fields.awal_saldo_cuti') }}</label>
                <select class="form-control {{ $errors->has('awal_saldo_cuti') ? 'is-invalid' : '' }}" name="awal_saldo_cuti" id="awal_saldo_cuti" required>
                    <option value disabled {{ old('awal_saldo_cuti', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Setting::AWAL_SALDO_CUTI_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('awal_saldo_cuti', $setting->awal_saldo_cuti) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('awal_saldo_cuti'))
                    <span class="text-danger">{{ $errors->first('awal_saldo_cuti') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.awal_saldo_cuti_helper') }}</span>
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