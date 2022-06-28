@extends('layouts.admin')
@section('content')
@can('kategori_dasar_hukum_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.kategori-dasar-hukums.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.kategoriDasarHukum.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="row row-cols-1 row-cols-md-4 g-4">
    @foreach($kategori as $value)
        <div class="col">
            <div class="card">
                @if($value->baner)
                    <img class="card-img-top" src="{{ $value->baner->getUrl() }}" alt="">
                @endif

                <div class="card-body">
                    <a href="{{route('admin.dasar-hukums.detail',$value->id)}}">
                        <h5 class="card-title">{{ $value->nama }}</h5>
                    </a>
                </div>
            </div>
        </div>
    @endforeach
</div>
<div class="card">
    <div class="card-header">
        {{ trans('cruds.kategoriDasarHukum.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-KategoriDasarHukum">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.kategoriDasarHukum.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.kategoriDasarHukum.fields.nama') }}
                    </th>
                    <th>
                        {{ trans('cruds.kategoriDasarHukum.fields.baner') }}
                    </th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
            </thead>
        </table>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('kategori_dasar_hukum_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.kategori-dasar-hukums.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
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

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.kategori-dasar-hukums.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'nama', name: 'nama' },
{ data: 'baner', name: 'baner', sortable: false, searchable: false },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 10,
  };
  let table = $('.datatable-KategoriDasarHukum').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

});

</script>
@endsection
