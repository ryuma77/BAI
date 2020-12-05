@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.bpj.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.bpjs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.bpj.fields.id') }}
                        </th>
                        <td>
                            {{ $bpj->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bpj.fields.jenis_program') }}
                        </th>
                        <td>
                            {{ App\Models\Bpj::JENIS_PROGRAM_SELECT[$bpj->jenis_program] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bpj.fields.perusahaan') }}
                        </th>
                        <td>
                            {{ $bpj->perusahaan }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bpj.fields.karyawan') }}
                        </th>
                        <td>
                            {{ $bpj->karyawan }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.bpjs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection