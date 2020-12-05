@extends('layouts.admin')
@section('content')
@can('jadwal_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.jadwals.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.jadwal.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.jadwal.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Jadwal">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.jadwal.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.jadwal.fields.tanggal_awal') }}
                        </th>
                        <th>
                            {{ trans('cruds.jadwal.fields.tanggal_akhir') }}
                        </th>
                        <th>
                            {{ trans('cruds.jadwal.fields.departement') }}
                        </th>
                        <th>
                            {{ trans('cruds.jadwal.fields.bagian') }}
                        </th>
                        <th>
                            {{ trans('cruds.jadwal.fields.jam_masuk') }}
                        </th>
                        <th>
                            {{ trans('cruds.jadwal.fields.jam_pulang') }}
                        </th>
                        <th>
                            {{ trans('cruds.jadwal.fields.kategori_jadwal') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jadwals as $key => $jadwal)
                        <tr data-entry-id="{{ $jadwal->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $jadwal->id ?? '' }}
                            </td>
                            <td>
                                {{ $jadwal->tanggal_awal ?? '' }}
                            </td>
                            <td>
                                {{ $jadwal->tanggal_akhir ?? '' }}
                            </td>
                            <td>
                                {{ $jadwal->departement->department_name ?? '' }}
                            </td>
                            <td>
                                {{ $jadwal->bagian->section_name ?? '' }}
                            </td>
                            <td>
                                {{ $jadwal->jam_masuk ?? '' }}
                            </td>
                            <td>
                                {{ $jadwal->jam_pulang ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Jadwal::KATEGORI_JADWAL_SELECT[$jadwal->kategori_jadwal] ?? '' }}
                            </td>
                            <td>
                                @can('jadwal_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.jadwals.show', $jadwal->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('jadwal_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.jadwals.edit', $jadwal->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('jadwal_delete')
                                    <form action="{{ route('admin.jadwals.destroy', $jadwal->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('jadwal_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.jadwals.massDestroy') }}",
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
  let table = $('.datatable-Jadwal:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection