@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.employeeFamily.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.employee-families.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="employee_name_id">{{ trans('cruds.employeeFamily.fields.employee_name') }}</label>
                <select class="form-control select2 {{ $errors->has('employee_name') ? 'is-invalid' : '' }}" name="employee_name_id" id="employee_name_id" required>
                    @foreach($employee_names as $id => $employee_name)
                        <option value="{{ $id }}" {{ old('employee_name_id') == $id ? 'selected' : '' }}>{{ $employee_name }}</option>
                    @endforeach
                </select>
                @if($errors->has('employee_name'))
                    <span class="text-danger">{{ $errors->first('employee_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.employeeFamily.fields.employee_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="family_name">{{ trans('cruds.employeeFamily.fields.family_name') }}</label>
                <input class="form-control {{ $errors->has('family_name') ? 'is-invalid' : '' }}" type="text" name="family_name" id="family_name" value="{{ old('family_name', '') }}" required>
                @if($errors->has('family_name'))
                    <span class="text-danger">{{ $errors->first('family_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.employeeFamily.fields.family_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.employeeFamily.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status">
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\EmployeeFamily::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.employeeFamily.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="keterangan">{{ trans('cruds.employeeFamily.fields.keterangan') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('keterangan') ? 'is-invalid' : '' }}" name="keterangan" id="keterangan">{!! old('keterangan') !!}</textarea>
                @if($errors->has('keterangan'))
                    <span class="text-danger">{{ $errors->first('keterangan') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.employeeFamily.fields.keterangan_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nik_id">{{ trans('cruds.employeeFamily.fields.nik') }}</label>
                <select class="form-control select2 {{ $errors->has('nik') ? 'is-invalid' : '' }}" name="nik_id" id="nik_id" required>
                    @foreach($niks as $id => $nik)
                        <option value="{{ $id }}" {{ old('nik_id') == $id ? 'selected' : '' }}>{{ $nik }}</option>
                    @endforeach
                </select>
                @if($errors->has('nik'))
                    <span class="text-danger">{{ $errors->first('nik') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.employeeFamily.fields.nik_helper') }}</span>
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
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '/admin/employee-families/ckmedia', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $employeeFamily->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

@endsection