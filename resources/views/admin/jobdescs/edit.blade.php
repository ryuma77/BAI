@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.jobdesc.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.jobdescs.update", [$jobdesc->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="department_id">{{ trans('cruds.jobdesc.fields.department') }}</label>
                <select class="form-control select2 {{ $errors->has('department') ? 'is-invalid' : '' }}" name="department_id" id="department_id" required>
                    @foreach($departments as $id => $department)
                        <option value="{{ $id }}" {{ (old('department_id') ? old('department_id') : $jobdesc->department->id ?? '') == $id ? 'selected' : '' }}>{{ $department }}</option>
                    @endforeach
                </select>
                @if($errors->has('department'))
                    <span class="text-danger">{{ $errors->first('department') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.jobdesc.fields.department_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="position_id">{{ trans('cruds.jobdesc.fields.position') }}</label>
                <select class="form-control select2 {{ $errors->has('position') ? 'is-invalid' : '' }}" name="position_id" id="position_id" required>
                    @foreach($positions as $id => $position)
                        <option value="{{ $id }}" {{ (old('position_id') ? old('position_id') : $jobdesc->position->id ?? '') == $id ? 'selected' : '' }}>{{ $position }}</option>
                    @endforeach
                </select>
                @if($errors->has('position'))
                    <span class="text-danger">{{ $errors->first('position') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.jobdesc.fields.position_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="level_id">{{ trans('cruds.jobdesc.fields.level') }}</label>
                <select class="form-control select2 {{ $errors->has('level') ? 'is-invalid' : '' }}" name="level_id" id="level_id" required>
                    @foreach($levels as $id => $level)
                        <option value="{{ $id }}" {{ (old('level_id') ? old('level_id') : $jobdesc->level->id ?? '') == $id ? 'selected' : '' }}>{{ $level }}</option>
                    @endforeach
                </select>
                @if($errors->has('level'))
                    <span class="text-danger">{{ $errors->first('level') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.jobdesc.fields.level_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="jobdesc">{{ trans('cruds.jobdesc.fields.jobdesc') }}</label>
                <input class="form-control {{ $errors->has('jobdesc') ? 'is-invalid' : '' }}" type="text" name="jobdesc" id="jobdesc" value="{{ old('jobdesc', $jobdesc->jobdesc) }}" required>
                @if($errors->has('jobdesc'))
                    <span class="text-danger">{{ $errors->first('jobdesc') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.jobdesc.fields.jobdesc_helper') }}</span>
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