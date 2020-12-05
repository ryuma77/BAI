@extends('layouts.admin')
@section('content')
@can('libur_nasional_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.libur-nasionals.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.liburNasional.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.liburNasional.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-LiburNasional">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.liburNasional.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.liburNasional.fields.tanggal') }}
                        </th>
                        <th>
                            {{ trans('cruds.liburNasional.fields.keterangan') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($liburNasionals as $key => $liburNasional)
                        <tr data-entry-id="{{ $liburNasional->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $liburNasional->id ?? '' }}
                            </td>
                            <td>
                                {{ $liburNasional->tanggal ?? '' }}
                            </td>
                            <td>
                                {{ $liburNasional->keterangan ?? '' }}
                            </td>
                            <td>
                                @can('libur_nasional_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.libur-nasionals.show', $liburNasional->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('libur_nasional_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.libur-nasionals.edit', $liburNasional->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('libur_nasional_delete')
                                    <form action="{{ route('admin.libur-nasionals.destroy', $liburNasional->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('libur_nasional_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.libur-nasionals.massDestroy') }}",
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
  let table = $('.datatable-LiburNasional:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection