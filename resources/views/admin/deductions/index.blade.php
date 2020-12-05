@extends('layouts.admin')
@section('content')
@can('deduction_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.deductions.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.deduction.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.deduction.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Deduction">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.deduction.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.deduction.fields.kode_allowance') }}
                        </th>
                        <th>
                            {{ trans('cruds.deduction.fields.allowance') }}
                        </th>
                        <th>
                            {{ trans('cruds.deduction.fields.allowance_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.deduction.fields.nilai') }}
                        </th>
                        <th>
                            {{ trans('cruds.deduction.fields.keterangan') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($deductions as $key => $deduction)
                        <tr data-entry-id="{{ $deduction->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $deduction->id ?? '' }}
                            </td>
                            <td>
                                {{ $deduction->kode_allowance ?? '' }}
                            </td>
                            <td>
                                {{ $deduction->allowance ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Deduction::ALLOWANCE_TYPE_SELECT[$deduction->allowance_type] ?? '' }}
                            </td>
                            <td>
                                {{ $deduction->nilai ?? '' }}
                            </td>
                            <td>
                                {{ $deduction->keterangan ?? '' }}
                            </td>
                            <td>
                                @can('deduction_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.deductions.show', $deduction->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('deduction_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.deductions.edit', $deduction->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('deduction_delete')
                                    <form action="{{ route('admin.deductions.destroy', $deduction->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('deduction_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.deductions.massDestroy') }}",
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
  let table = $('.datatable-Deduction:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection