@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.tarikDataabsen.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tarik-dataabsens.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.tarikDataabsen.fields.id') }}
                        </th>
                        <td>
                            {{ $tarikDataabsen->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tarikDataabsen.fields.ip_address') }}
                        </th>
                        <td>
                            {{ $tarikDataabsen->ip_address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tarikDataabsen.fields.nik') }}
                        </th>
                        <td>
                            {{ $tarikDataabsen->nik->nik ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tarikDataabsen.fields.tanggal') }}
                        </th>
                        <td>
                            {{ $tarikDataabsen->tanggal }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tarikDataabsen.fields.jam_masuk') }}
                        </th>
                        <td>
                            {{ $tarikDataabsen->jam_masuk }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tarikDataabsen.fields.jam_keluar') }}
                        </th>
                        <td>
                            {{ $tarikDataabsen->jam_keluar }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tarik-dataabsens.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection