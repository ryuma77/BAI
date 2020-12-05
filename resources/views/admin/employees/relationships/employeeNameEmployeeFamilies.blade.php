<div class="m-3">
    @can('employee_family_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.employee-families.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.employeeFamily.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.employeeFamily.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-employeeNameEmployeeFamilies">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.employeeFamily.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.employeeFamily.fields.employee_name') }}
                            </th>
                            <th>
                                {{ trans('cruds.employee.fields.nama') }}
                            </th>
                            <th>
                                {{ trans('cruds.employeeFamily.fields.family_name') }}
                            </th>
                            <th>
                                {{ trans('cruds.employeeFamily.fields.status') }}
                            </th>
                            <th>
                                {{ trans('cruds.employeeFamily.fields.nik') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($employeeFamilies as $key => $employeeFamily)
                            <tr data-entry-id="{{ $employeeFamily->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $employeeFamily->id ?? '' }}
                                </td>
                                <td>
                                    {{ $employeeFamily->employee_name->nama ?? '' }}
                                </td>
                                <td>
                                    {{ $employeeFamily->employee_name->nama ?? '' }}
                                </td>
                                <td>
                                    {{ $employeeFamily->family_name ?? '' }}
                                </td>
                                <td>
                                    {{ App\Models\EmployeeFamily::STATUS_SELECT[$employeeFamily->status] ?? '' }}
                                </td>
                                <td>
                                    {{ $employeeFamily->nik->nik ?? '' }}
                                </td>
                                <td>
                                    @can('employee_family_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.employee-families.show', $employeeFamily->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('employee_family_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.employee-families.edit', $employeeFamily->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('employee_family_delete')
                                        <form action="{{ route('admin.employee-families.destroy', $employeeFamily->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
</div>
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('employee_family_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.employee-families.massDestroy') }}",
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
  let table = $('.datatable-employeeNameEmployeeFamilies:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection