@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.salary.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.salaries.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.salary.fields.id') }}
                        </th>
                        <td>
                            {{ $salary->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salary.fields.employee') }}
                        </th>
                        <td>
                            {{ $salary->employee->nama ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salary.fields.basic_salary') }}
                        </th>
                        <td>
                            {{ $salary->basic_salary }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salary.fields.bpjs') }}
                        </th>
                        <td>
                            @foreach($salary->bpjs as $key => $bpjs)
                                <span class="label label-info">{{ $bpjs->jenis_program }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salary.fields.tunjangan') }}
                        </th>
                        <td>
                            @foreach($salary->tunjangans as $key => $tunjangan)
                                <span class="label label-info">{{ $tunjangan->kode_allowance }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salary.fields.potongan') }}
                        </th>
                        <td>
                            @foreach($salary->potongans as $key => $potongan)
                                <span class="label label-info">{{ $potongan->kode_allowance }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.salaries.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection