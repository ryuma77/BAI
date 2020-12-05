@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.employee.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.employees.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="nik">{{ trans('cruds.employee.fields.nik') }}</label>
                <input class="form-control {{ $errors->has('nik') ? 'is-invalid' : '' }}" type="text" name="nik" id="nik" value="{{ old('nik', '') }}" required>
                @if($errors->has('nik'))
                    <span class="text-danger">{{ $errors->first('nik') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.employee.fields.nik_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nama">{{ trans('cruds.employee.fields.nama') }}</label>
                <input class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}" type="text" name="nama" id="nama" value="{{ old('nama', '') }}" required>
                @if($errors->has('nama'))
                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.employee.fields.nama_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="tempat_lahir">{{ trans('cruds.employee.fields.tempat_lahir') }}</label>
                <input class="form-control {{ $errors->has('tempat_lahir') ? 'is-invalid' : '' }}" type="text" name="tempat_lahir" id="tempat_lahir" value="{{ old('tempat_lahir', '') }}" required>
                @if($errors->has('tempat_lahir'))
                    <span class="text-danger">{{ $errors->first('tempat_lahir') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.employee.fields.tempat_lahir_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="tanggal_lahir">{{ trans('cruds.employee.fields.tanggal_lahir') }}</label>
                <input class="form-control date {{ $errors->has('tanggal_lahir') ? 'is-invalid' : '' }}" type="text" name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required>
                @if($errors->has('tanggal_lahir'))
                    <span class="text-danger">{{ $errors->first('tanggal_lahir') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.employee.fields.tanggal_lahir_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.employee.fields.jenis_kelamin') }}</label>
                <select class="form-control {{ $errors->has('jenis_kelamin') ? 'is-invalid' : '' }}" name="jenis_kelamin" id="jenis_kelamin" required>
                    <option value disabled {{ old('jenis_kelamin', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Employee::JENIS_KELAMIN_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('jenis_kelamin', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('jenis_kelamin'))
                    <span class="text-danger">{{ $errors->first('jenis_kelamin') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.employee.fields.jenis_kelamin_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="division_id">{{ trans('cruds.employee.fields.division') }}</label>
                <select class="form-control select2 {{ $errors->has('division') ? 'is-invalid' : '' }}" name="division_id" id="division_id" required>
                    @foreach($divisions as $id => $division)
                        <option value="{{ $id }}" {{ old('division_id') == $id ? 'selected' : '' }}>{{ $division }}</option>
                    @endforeach
                </select>
                @if($errors->has('division'))
                    <span class="text-danger">{{ $errors->first('division') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.employee.fields.division_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="department_id">{{ trans('cruds.employee.fields.department') }}</label>
                <select class="form-control select2 {{ $errors->has('department') ? 'is-invalid' : '' }}" name="department_id" id="department_id" required>
                    @foreach($departments as $id => $department)
                        <option value="{{ $id }}" {{ old('department_id') == $id ? 'selected' : '' }}>{{ $department }}</option>
                    @endforeach
                </select>
                @if($errors->has('department'))
                    <span class="text-danger">{{ $errors->first('department') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.employee.fields.department_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="position_id">{{ trans('cruds.employee.fields.position') }}</label>
                <select class="form-control select2 {{ $errors->has('position') ? 'is-invalid' : '' }}" name="position_id" id="position_id" required>
                    @foreach($positions as $id => $position)
                        <option value="{{ $id }}" {{ old('position_id') == $id ? 'selected' : '' }}>{{ $position }}</option>
                    @endforeach
                </select>
                @if($errors->has('position'))
                    <span class="text-danger">{{ $errors->first('position') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.employee.fields.position_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.employee.fields.marital_status') }}</label>
                <select class="form-control {{ $errors->has('marital_status') ? 'is-invalid' : '' }}" name="marital_status" id="marital_status">
                    <option value disabled {{ old('marital_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Employee::MARITAL_STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('marital_status', 'Single') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('marital_status'))
                    <span class="text-danger">{{ $errors->first('marital_status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.employee.fields.marital_status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="alamat">{{ trans('cruds.employee.fields.alamat') }}</label>
                <input class="form-control {{ $errors->has('alamat') ? 'is-invalid' : '' }}" type="text" name="alamat" id="alamat" value="{{ old('alamat', '') }}">
                @if($errors->has('alamat'))
                    <span class="text-danger">{{ $errors->first('alamat') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.employee.fields.alamat_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kota">{{ trans('cruds.employee.fields.kota') }}</label>
                <input class="form-control {{ $errors->has('kota') ? 'is-invalid' : '' }}" type="text" name="kota" id="kota" value="{{ old('kota', '') }}">
                @if($errors->has('kota'))
                    <span class="text-danger">{{ $errors->first('kota') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.employee.fields.kota_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kode_pos">{{ trans('cruds.employee.fields.kode_pos') }}</label>
                <input class="form-control {{ $errors->has('kode_pos') ? 'is-invalid' : '' }}" type="text" name="kode_pos" id="kode_pos" value="{{ old('kode_pos', '') }}">
                @if($errors->has('kode_pos'))
                    <span class="text-danger">{{ $errors->first('kode_pos') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.employee.fields.kode_pos_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.employee.fields.employee_status') }}</label>
                <select class="form-control {{ $errors->has('employee_status') ? 'is-invalid' : '' }}" name="employee_status" id="employee_status" required>
                    <option value disabled {{ old('employee_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Employee::EMPLOYEE_STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('employee_status', 'Draft') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('employee_status'))
                    <span class="text-danger">{{ $errors->first('employee_status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.employee.fields.employee_status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="jpg">{{ trans('cruds.employee.fields.jpg') }}</label>
                <div class="needsclick dropzone {{ $errors->has('jpg') ? 'is-invalid' : '' }}" id="jpg-dropzone">
                </div>
                @if($errors->has('jpg'))
                    <span class="text-danger">{{ $errors->first('jpg') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.employee.fields.jpg_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.jpgDropzone = {
    url: '{{ route('admin.employees.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="jpg"]').remove()
      $('form').append('<input type="hidden" name="jpg" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="jpg"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($employee) && $employee->jpg)
      var file = {!! json_encode($employee->jpg) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="jpg" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
@endsection