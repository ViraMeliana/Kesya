@extends('layouts.admin')
@section('content')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.perhitungan-akads.showCreate',['detail'=>'istisna']) }}">
                {{ trans('global.add') }} {{ trans('cruds.istina.title_singular') }}
            </a>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.istina.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-Istina">
                    <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.istina.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.istina.fields.nama_barang') }}
                        </th>
                        <th>
                            {{ trans('cruds.istina.fields.bahan') }}
                        </th>
                        <th>
                            {{ trans('cruds.istina.fields.ukuran') }}
                        </th>
                        <th>
                            {{ trans('cruds.istina.fields.model') }}
                        </th>
                        <th>
                            {{ trans('cruds.istina.fields.warna') }}
                        </th>
                        <th>
                            {{ trans('cruds.istina.fields.jumlah_pesanan') }}
                        </th>
                        <th>
                            {{ trans('cruds.istina.fields.harga_satuan') }}
                        </th>
                        <th>
                            {{ trans('cruds.istina.fields.jangka_waktu') }}
                        </th>
                        <th>
                            {{ trans('cruds.istina.fields.biaya_bank') }}
                        </th>
                        <th>
                            {{ trans('cruds.istina.fields.margin_keuntungan_istisna') }}
                        </th>
                        <th>
                            {{ trans('cruds.istina.fields.margin_keuntungan_perbulan') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($result != null)
                        @foreach($result as $key => $istina)
                            <tr data-entry-id="{{ $istina['id'] }}">
                                <td>

                                </td>
                                <td>
                                    {{ $istina['id'] ?? '' }}
                                </td>
                                <td>
                                    {{ $istina['collection']->nama_barang ?? '' }}
                                </td>
                                <td>
                                    {{ $istina['collection']->bahan ?? '' }}
                                </td>
                                <td>
                                    {{ $istina['collection']->ukuran ?? '' }}
                                </td>
                                <td>
                                    {{ $istina['collection']->model ?? '' }}
                                </td>
                                <td>
                                    {{ $istina['collection']->warna ?? '' }}
                                </td>
                                <td>
                                    {{ ($istina['collection']->jumlah_pesanan) ?? '' }}
                                </td>
                                <td>
                                    {{ ($istina['collection']->harga_satuan) ?? '' }}
                                </td>
                                <td>
                                    {{ $istina['collection']->jangka_waktu ?? '' }}
                                </td>
                                <td>
                                    {{ ($istina['collection']->biaya_bank) ?? '' }}
                                </td>
                                <td>
                                    {{ $istina['collection']->margin_keuntungan_istisna ?? '' }}%
                                </td>
                                <td>
                                    {{ $istina['collection']->margin_keuntungan_perbulan ?? '' }}%
                                </td>
                                <td>
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.perhitungan-akads.showDetail', ['detail'=>'istisna','code'=>$istina['code']]) }}">
                                        {{ trans('global.view') }}
                                    </a>

                                    <form action="{{ route('admin.perhitungan-akads.destroy', $istina['id']) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
                    var ids = $.map(dt.rows({selected: true}).nodes(), function (entry) {
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
                            data: {ids: ids, _method: 'DELETE'}
                        })
                            .done(function () {
                                location.reload()
                            })
                    }
                }
            }
            dtButtons.push(deleteButton)

            $.extend(true, $.fn.dataTable.defaults, {
                orderCellsTop: true,
                order: [[1, 'desc']],
                pageLength: 10,
            });
            let table = $('.datatable-Istina:not(.ajaxTable)').DataTable({buttons: dtButtons})
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function (e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        })

    </script>
@endsection
