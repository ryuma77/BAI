@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.jenisCuti.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.jenis-cutis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.jenisCuti.fields.id') }}
                        </th>
                        <td>
                            {{ $jenisCuti->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jenisCuti.fields.kode_cuti') }}
                        </th>
                        <td>
                            {{ $jenisCuti->kode_cuti }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jenisCuti.fields.jenis_cuti') }}
                        </th>
                        <td>
                            {{ $jenisCuti->jenis_cuti }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jenisCuti.fields.maks_pertahun') }}
                        </th>
                        <td>
                            {{ $jenisCuti->maks_pertahun }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jenisCuti.fields.keterangan') }}
                        </th>
                        <td>
                            {{ $jenisCuti->keterangan }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.jenis-cutis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection