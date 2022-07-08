@extends('layouts.admin')
@section('content')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.perhitungan-akads.showCreate',['detail'=>'salam']) }}">
                    {{ trans('global.add') }} {{ trans('cruds.salam.title_singular') }}
                </a>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                {{ trans('cruds.salam.title_singular') }} {{ trans('global.list') }}
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class=" table table-bordered table-striped table-hover datatable datatable-Salam">
                        <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.salam.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.salam.fields.nama_barang') }}
                            </th>
                            <th>
                                {{ trans('cruds.salam.fields.jenis_barang') }}
                            </th>
                            <th>
                                {{ trans('cruds.salam.fields.jumlah_pesanan') }}
                            </th>
                            <th>
                                {{ trans('cruds.salam.fields.jangka_waktu') }}
                            </th>
                            <th>
                                {{ trans('cruds.salam.fields.harga_beli') }}
                            </th>
                            <th>
                                {{ trans('cruds.salam.fields.harga_jual') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($result != null)
                            @foreach($result as $key => $salam)
                            <tr data-entry-id="{{ $salam['id'] }}">
                                <td>

                                </td>
                                <td>
                                    {{ $salam['id'] ?? '' }}
                                </td>
                                <td>
                                    {{ $salam['collection']->nama_barang ?? '' }}
                                </td>
                                <td>
                                    {{ $salam['collection']->jenis_barang ?? '' }}
                                </td>
                                <td>
                                    {{ ($salam['collection']->jumlah_pesanan) ?? '' }}
                                </td>
                                <td>
                                    {{ $salam['collection']->jangka_waktu ?? '' }}
                                </td>
                                <td>
                                    {{ ($salam['collection']->harga_beli) ?? '' }}
                                </td>
                                <td>
                                    {{ ($salam['collection']->harga_jual) ?? '' }}
                                </td>
                                <td>
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.perhitungan-akads.showDetail', ['detail'=>'salam','code'=>$salam['code']]) }}">
                                        {{ trans('global.view') }}
                                    </a>

                                    <form action="{{ route('admin.perhitungan-akads.destroy', $salam['id']) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>

                                </td>

                            </tr>
                        @endforeach
                        @endif
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
            let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('admin.perhitungan-akads.massDestroy') }}",
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

            $.extend(true, $.fn.dataTable.defaults, {
                orderCellsTop: true,
                order: [[ 1, 'desc' ]],
                pageLength: 10,
            });
            let table = $('.datatable-Salam:not(.ajaxTable)').DataTable({ buttons: dtButtons })
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        })

    </script>
@endsection
