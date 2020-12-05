@extends('layouts.admin')
@section('content')
@can('allowance_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.allowances.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.allowance.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.allowance.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Allowance">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.allowance.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.allowance.fields.kode_allowance') }}
                        </th>
                        <th>
                            {{ trans('cruds.allowance.fields.allowance') }}
                        </th>
                        <th>
                            {{ trans('cruds.allowance.fields.allowance_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.allowance.fields.nilai') }}
                        </th>
                        <th>
                            {{ trans('cruds.allowance.fields.keterangan') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($allowances as $key => $allowance)
                        <tr data-entry-id="{{ $allowance->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $allowance->id ?? '' }}
                            </td>
                            <td>
                                {{ $allowance->kode_allowance ?? '' }}
                            </td>
                            <td>
                                {{ $allowance->allowance ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Allowance::ALLOWANCE_TYPE_SELECT[$allowance->allowance_type] ?? '' }}
                            </td>
                            <td>
                                {{ $allowance->nilai ?? '' }}
                            </td>
                            <td>
                                {{ $allowance->keterangan ?? '' }}
                            </td>
                            <td>
                                @can('allowance_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.allowances.show', $allowance->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('allowance_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.allowances.edit', $allowance->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('allowance_delete')
                                    <form action="{{ route('admin.allowances.destroy', $allowance->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('allowance_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.allowances.massDestroy') }}",
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
  let table = $('.datatable-Allowance:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection