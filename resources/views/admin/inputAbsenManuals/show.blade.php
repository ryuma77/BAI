@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.inputAbsenManual.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.input-absen-manuals.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.inputAbsenManual.fields.id') }}
                        </th>
                        <td>
                            {{ $inputAbsenManual->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inputAbsenManual.fields.ip_address') }}
                        </th>
                        <td>
                            {{ $inputAbsenManual->ip_address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inputAbsenManual.fields.nik') }}
                        </th>
                        <td>
                            {{ $inputAbsenManual->nik->nik ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inputAbsenManual.fields.tanggal') }}
                        </th>
                        <td>
                            {{ $inputAbsenManual->tanggal }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inputAbsenManual.fields.jam_masuk') }}
                        </th>
                        <td>
                            {{ $inputAbsenManual->jam_masuk }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inputAbsenManual.fields.jam_keluar') }}
                        </th>
                        <td>
                            {{ $inputAbsenManual->jam_keluar }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.input-absen-manuals.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection