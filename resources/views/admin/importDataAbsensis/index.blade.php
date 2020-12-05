@extends('layouts.admin')
@section('content')
@can('import_data_absensi_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.import-data-absensis.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.importDataAbsensi.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.importDataAbsensi.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-ImportDataAbsensi">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.importDataAbsensi.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.importDataAbsensi.fields.nik') }}
                        </th>
                        <th>
                            {{ trans('cruds.importDataAbsensi.fields.tanggal') }}
                        </th>
                        <th>
                            {{ trans('cruds.importDataAbsensi.fields.jam_masuk') }}
                        </th>
                        <th>
                            {{ trans('cruds.importDataAbsensi.fields.jam_keluar') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($importDataAbsensis as $key => $importDataAbsensi)
                        <tr data-entry-id="{{ $importDataAbsensi->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $importDataAbsensi->id ?? '' }}
                            </td>
                            <td>
                                {{ $importDataAbsensi->nik->nik ?? '' }}
                            </td>
                            <td>
                                {{ $importDataAbsensi->tanggal ?? '' }}
                            </td>
                            <td>
                                {{ $importDataAbsensi->jam_masuk ?? '' }}
                            </td>
                            <td>
                                {{ $importDataAbsensi->jam_keluar ?? '' }}
                            </td>
                            <td>
                                @can('import_data_absensi_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.import-data-absensis.show', $importDataAbsensi->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('import_data_absensi_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.import-data-absensis.edit', $importDataAbsensi->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('import_data_absensi_delete')
                                    <form action="{{ route('admin.import-data-absensis.destroy', $importDataAbsensi->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('import_data_absensi_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.import-data-absensis.massDestroy') }}",
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
  let table = $('.datatable-ImportDataAbsensi:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection