@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.salary.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.salaries.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="employee_id">{{ trans('cruds.salary.fields.employee') }}</label>
                <select class="form-control select2 {{ $errors->has('employee') ? 'is-invalid' : '' }}" name="employee_id" id="employee_id" required>
                    @foreach($employees as $id => $employee)
                        <option value="{{ $id }}" {{ old('employee_id') == $id ? 'selected' : '' }}>{{ $employee }}</option>
                    @endforeach
                </select>
                @if($errors->has('employee'))
                    <span class="text-danger">{{ $errors->first('employee') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.salary.fields.employee_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="basic_salary">{{ trans('cruds.salary.fields.basic_salary') }}</label>
                <input class="form-control {{ $errors->has('basic_salary') ? 'is-invalid' : '' }}" type="number" name="basic_salary" id="basic_salary" value="{{ old('basic_salary', '') }}" step="0.01" required>
                @if($errors->has('basic_salary'))
                    <span class="text-danger">{{ $errors->first('basic_salary') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.salary.fields.basic_salary_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="bpjs">{{ trans('cruds.salary.fields.bpjs') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('bpjs') ? 'is-invalid' : '' }}" name="bpjs[]" id="bpjs" multiple>
                    @foreach($bpjs as $id => $bpjs)
                        <option value="{{ $id }}" {{ in_array($id, old('bpjs', [])) ? 'selected' : '' }}>{{ $bpjs }}</option>
                    @endforeach
                </select>
                @if($errors->has('bpjs'))
                    <span class="text-danger">{{ $errors->first('bpjs') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.salary.fields.bpjs_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tunjangans">{{ trans('cruds.salary.fields.tunjangan') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('tunjangans') ? 'is-invalid' : '' }}" name="tunjangans[]" id="tunjangans" multiple>
                    @foreach($tunjangans as $id => $tunjangan)
                        <option value="{{ $id }}" {{ in_array($id, old('tunjangans', [])) ? 'selected' : '' }}>{{ $tunjangan }}</option>
                    @endforeach
                </select>
                @if($errors->has('tunjangans'))
                    <span class="text-danger">{{ $errors->first('tunjangans') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.salary.fields.tunjangan_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="potongans">{{ trans('cruds.salary.fields.potongan') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('potongans') ? 'is-invalid' : '' }}" name="potongans[]" id="potongans" multiple>
                    @foreach($potongans as $id => $potongan)
                        <option value="{{ $id }}" {{ in_array($id, old('potongans', [])) ? 'selected' : '' }}>{{ $potongan }}</option>
                    @endforeach
                </select>
                @if($errors->has('potongans'))
                    <span class="text-danger">{{ $errors->first('potongans') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.salary.fields.potongan_helper') }}</span>
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