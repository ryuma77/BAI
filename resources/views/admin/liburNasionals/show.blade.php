@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.liburNasional.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.libur-nasionals.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.liburNasional.fields.id') }}
                        </th>
                        <td>
                            {{ $liburNasional->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.liburNasional.fields.tanggal') }}
                        </th>
                        <td>
                            {{ $liburNasional->tanggal }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.liburNasional.fields.keterangan') }}
                        </th>
                        <td>
                            {{ $liburNasional->keterangan }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.libur-nasionals.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection