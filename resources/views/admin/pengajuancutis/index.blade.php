@extends('layouts.admin')
@section('content')
@can('pengajuancuti_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.pengajuancutis.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.pengajuancuti.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.pengajuancuti.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Pengajuancuti">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.pengajuancuti.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.pengajuancuti.fields.nik') }}
                        </th>
                        <th>
                            {{ trans('cruds.pengajuancuti.fields.nama') }}
                        </th>
                        <th>
                            {{ trans('cruds.pengajuancuti.fields.jenis_cuti') }}
                        </th>
                        <th>
                            {{ trans('cruds.pengajuancuti.fields.tanggal_cuti') }}
                        </th>
                        <th>
                            {{ trans('cruds.pengajuancuti.fields.lama_cuti') }}
                        </th>
                        <th>
                            {{ trans('cruds.pengajuancuti.fields.sisa_cuti') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pengajuancutis as $key => $pengajuancuti)
                        <tr data-entry-id="{{ $pengajuancuti->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $pengajuancuti->id ?? '' }}
                            </td>
                            <td>
                                {{ $pengajuancuti->nik->nik ?? '' }}
                            </td>
                            <td>
                                {{ $pengajuancuti->nama->nama ?? '' }}
                            </td>
                            <td>
                                {{ $pengajuancuti->jenis_cuti->jenis_cuti ?? '' }}
                            </td>
                            <td>
                                {{ $pengajuancuti->tanggal_cuti ?? '' }}
                            </td>
                            <td>
                                {{ $pengajuancuti->lama_cuti ?? '' }}
                            </td>
                            <td>
                                {{ $pengajuancuti->sisa_cuti ?? '' }}
                            </td>
                            <td>
                                @can('pengajuancuti_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.pengajuancutis.show', $pengajuancuti->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('pengajuancuti_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.pengajuancutis.edit', $pengajuancuti->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('pengajuancuti_delete')
                                    <form action="{{ route('admin.pengajuancutis.destroy', $pengajuancuti->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('pengajuancuti_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.pengajuancutis.massDestroy') }}",
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
  let table = $('.datatable-Pengajuancuti:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection