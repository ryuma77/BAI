@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.pengajuancuti.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pengajuancutis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.pengajuancuti.fields.id') }}
                        </th>
                        <td>
                            {{ $pengajuancuti->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pengajuancuti.fields.nik') }}
                        </th>
                        <td>
                            {{ $pengajuancuti->nik->nik ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pengajuancuti.fields.nama') }}
                        </th>
                        <td>
                            {{ $pengajuancuti->nama->nama ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pengajuancuti.fields.jenis_cuti') }}
                        </th>
                        <td>
                            {{ $pengajuancuti->jenis_cuti->jenis_cuti ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pengajuancuti.fields.tanggal_cuti') }}
                        </th>
                        <td>
                            {{ $pengajuancuti->tanggal_cuti }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pengajuancuti.fields.lama_cuti') }}
                        </th>
                        <td>
                            {{ $pengajuancuti->lama_cuti }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pengajuancuti.fields.sisa_cuti') }}
                        </th>
                        <td>
                            {{ $pengajuancuti->sisa_cuti }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pengajuancutis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection