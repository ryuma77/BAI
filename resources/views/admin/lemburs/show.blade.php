@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.lembur.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.lemburs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.lembur.fields.id') }}
                        </th>
                        <td>
                            {{ $lembur->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lembur.fields.ip_address') }}
                        </th>
                        <td>
                            {{ $lembur->ip_address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lembur.fields.nik') }}
                        </th>
                        <td>
                            {{ $lembur->nik->nik ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lembur.fields.tanggal') }}
                        </th>
                        <td>
                            {{ $lembur->tanggal }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lembur.fields.jam_lembur') }}
                        </th>
                        <td>
                            {{ $lembur->jam_lembur }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lembur.fields.keterangan') }}
                        </th>
                        <td>
                            {{ $lembur->keterangan }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.lemburs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection