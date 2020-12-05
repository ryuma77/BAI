@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.jadwal.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.jadwals.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.jadwal.fields.id') }}
                        </th>
                        <td>
                            {{ $jadwal->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jadwal.fields.tanggal_awal') }}
                        </th>
                        <td>
                            {{ $jadwal->tanggal_awal }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jadwal.fields.tanggal_akhir') }}
                        </th>
                        <td>
                            {{ $jadwal->tanggal_akhir }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jadwal.fields.departement') }}
                        </th>
                        <td>
                            {{ $jadwal->departement->department_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jadwal.fields.bagian') }}
                        </th>
                        <td>
                            {{ $jadwal->bagian->section_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jadwal.fields.jam_masuk') }}
                        </th>
                        <td>
                            {{ $jadwal->jam_masuk }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jadwal.fields.jam_pulang') }}
                        </th>
                        <td>
                            {{ $jadwal->jam_pulang }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jadwal.fields.kategori_jadwal') }}
                        </th>
                        <td>
                            {{ App\Models\Jadwal::KATEGORI_JADWAL_SELECT[$jadwal->kategori_jadwal] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.jadwals.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection