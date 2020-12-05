@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.importDataAbsensi.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.import-data-absensis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.importDataAbsensi.fields.id') }}
                        </th>
                        <td>
                            {{ $importDataAbsensi->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.importDataAbsensi.fields.nik') }}
                        </th>
                        <td>
                            {{ $importDataAbsensi->nik->nik ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.importDataAbsensi.fields.tanggal') }}
                        </th>
                        <td>
                            {{ $importDataAbsensi->tanggal }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.importDataAbsensi.fields.jam_masuk') }}
                        </th>
                        <td>
                            {{ $importDataAbsensi->jam_masuk }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.importDataAbsensi.fields.jam_keluar') }}
                        </th>
                        <td>
                            {{ $importDataAbsensi->jam_keluar }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.import-data-absensis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection