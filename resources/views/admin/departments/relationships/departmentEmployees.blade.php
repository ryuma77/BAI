<div class="m-3">
    @can('employee_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.employees.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.employee.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.employee.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-departmentEmployees">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.employee.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.employee.fields.nik') }}
                            </th>
                            <th>
                                {{ trans('cruds.employee.fields.nama') }}
                            </th>
                            <th>
                                {{ trans('cruds.employee.fields.tempat_lahir') }}
                            </th>
                            <th>
                                {{ trans('cruds.employee.fields.tanggal_lahir') }}
                            </th>
                            <th>
                                {{ trans('cruds.employee.fields.jenis_kelamin') }}
                            </th>
                            <th>
                                {{ trans('cruds.employee.fields.division') }}
                            </th>
                            <th>
                                {{ trans('cruds.employee.fields.department') }}
                            </th>
                            <th>
                                {{ trans('cruds.employee.fields.position') }}
                            </th>
                            <th>
                                {{ trans('cruds.employee.fields.marital_status') }}
                            </th>
                            <th>
                                {{ trans('cruds.employee.fields.alamat') }}
                            </th>
                            <th>
                                {{ trans('cruds.employee.fields.kota') }}
                            </th>
                            <th>
                                {{ trans('cruds.employee.fields.kode_pos') }}
                            </th>
                            <th>
                                {{ trans('cruds.employee.fields.employee_status') }}
                            </th>
                            <th>
                                {{ trans('cruds.employee.fields.resign') }}
                            </th>
                            <th>
                                {{ trans('cruds.employee.fields.jpg') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($employees as $key => $employee)
                            <tr data-entry-id="{{ $employee->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $employee->id ?? '' }}
                                </td>
                                <td>
                                    {{ $employee->nik ?? '' }}
                                </td>
                                <td>
                                    {{ $employee->nama ?? '' }}
                                </td>
                                <td>
                                    {{ $employee->tempat_lahir ?? '' }}
                                </td>
                                <td>
                                    {{ $employee->tanggal_lahir ?? '' }}
                                </td>
                                <td>
                                    {{ App\Models\Employee::JENIS_KELAMIN_SELECT[$employee->jenis_kelamin] ?? '' }}
                                </td>
                                <td>
                                    {{ $employee->division->division_name ?? '' }}
                                </td>
                                <td>
                                    {{ $employee->department->department_name ?? '' }}
                                </td>
                                <td>
                                    {{ $employee->position->position_name ?? '' }}
                                </td>
                                <td>
                                    {{ App\Models\Employee::MARITAL_STATUS_SELECT[$employee->marital_status] ?? '' }}
                                </td>
                                <td>
                                    {{ $employee->alamat ?? '' }}
                                </td>
                                <td>
                                    {{ $employee->kota ?? '' }}
                                </td>
                                <td>
                                    {{ $employee->kode_pos ?? '' }}
                                </td>
                                <td>
                                    {{ App\Models\Employee::EMPLOYEE_STATUS_SELECT[$employee->employee_status] ?? '' }}
                                </td>
                                <td>
                                    {{ App\Models\Employee::RESIGN_SELECT[$employee->resign] ?? '' }}
                                </td>
                                <td>
                                    @if($employee->jpg)
                                        <a href="{{ $employee->jpg->getUrl() }}" target="_blank" style="display: inline-block">
                                            <img src="{{ $employee->jpg->getUrl('thumb') }}">
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    @can('employee_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.employees.show', $employee->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('employee_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.employees.edit', $employee->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('employee_delete')
                                        <form action="{{ route('admin.employees.destroy', $employee->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('employee_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.employees.massDestroy') }}",
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
  let table = $('.datatable-departmentEmployees:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection