@extends('layouts.admin')
@section('content')
@can('salary_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.salaries.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.salary.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.salary.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Salary">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.salary.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.salary.fields.employee') }}
                        </th>
                        <th>
                            {{ trans('cruds.employee.fields.nik') }}
                        </th>
                        <th>
                            {{ trans('cruds.salary.fields.basic_salary') }}
                        </th>
                        <th>
                            {{ trans('cruds.salary.fields.bpjs') }}
                        </th>
                        <th>
                            {{ trans('cruds.salary.fields.tunjangan') }}
                        </th>
                        <th>
                            {{ trans('cruds.salary.fields.potongan') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($salaries as $key => $salary)
                        <tr data-entry-id="{{ $salary->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $salary->id ?? '' }}
                            </td>
                            <td>
                                {{ $salary->employee->nama ?? '' }}
                            </td>
                            <td>
                                {{ $salary->employee->nik ?? '' }}
                            </td>
                            <td>
                                {{ $salary->basic_salary ?? '' }}
                            </td>
                            <td>
                                @foreach($salary->bpjs as $key => $item)
                                    <span class="badge badge-info">{{ $item->jenis_program }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach($salary->tunjangans as $key => $item)
                                    <span class="badge badge-info">{{ $item->kode_allowance }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach($salary->potongans as $key => $item)
                                    <span class="badge badge-info">{{ $item->kode_allowance }}</span>
                                @endforeach
                            </td>
                            <td>
                                @can('salary_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.salaries.show', $salary->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('salary_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.salaries.edit', $salary->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('salary_delete')
                                    <form action="{{ route('admin.salaries.destroy', $salary->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('salary_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.salaries.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Salary:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection