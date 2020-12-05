@extends('layouts.admin')
@section('content')
@can('rotation_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.rotations.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.rotation.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.rotation.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Rotation">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.rotation.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.rotation.fields.employee_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.employee.fields.nama') }}
                        </th>
                        <th>
                            {{ trans('cruds.rotation.fields.department_from') }}
                        </th>
                        <th>
                            {{ trans('cruds.rotation.fields.department_to') }}
                        </th>
                        <th>
                            {{ trans('cruds.rotation.fields.valid_date') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rotations as $key => $rotation)
                        <tr data-entry-id="{{ $rotation->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $rotation->id ?? '' }}
                            </td>
                            <td>
                                {{ $rotation->employee_name->nama ?? '' }}
                            </td>
                            <td>
                                {{ $rotation->employee_name->nama ?? '' }}
                            </td>
                            <td>
                                {{ $rotation->department_from->department_name ?? '' }}
                            </td>
                            <td>
                                {{ $rotation->department_to->department_name ?? '' }}
                            </td>
                            <td>
                                {{ $rotation->valid_date ?? '' }}
                            </td>
                            <td>
                                @can('rotation_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.rotations.show', $rotation->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('rotation_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.rotations.edit', $rotation->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('rotation_delete')
                                    <form action="{{ route('admin.rotations.destroy', $rotation->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('rotation_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.rotations.massDestroy') }}",
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
  let table = $('.datatable-Rotation:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection