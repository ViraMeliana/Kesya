@extends('layouts.admin')
@section('content')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.perhitungan-akads.showCreate',['detail'=>'pembiayaan-mudharabah']) }}">
                    {{ trans('global.add') }} {{ trans('cruds.pembiayaanMudharabah.title_singular') }}
                </a>
            </div>
        </div>
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.pembiayaanMudharabah.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-PembiayaanMudharabah">
                    <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.pembiayaanMudharabah.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.pembiayaanMudharabah.fields.nama_nasabah') }}
                        </th>
                        <th>
                            {{ trans('cruds.pembiayaanMudharabah.fields.nama_bank') }}
                        </th>
                        <th>
                            {{ trans('cruds.pembiayaanMudharabah.fields.kebutuhan_modal') }}
                        </th>
                        <th>
                            {{ trans('cruds.pembiayaanMudharabah.fields.modal_nasabah') }}
                        </th>
                        <th>
                            {{ trans('cruds.pembiayaanMudharabah.fields.proyeksi_penerimaan_perbulan') }}
                        </th>
                        <th>
                            {{ trans('cruds.pembiayaanMudharabah.fields.jangka_waktu') }}
                        </th>
                        <th>
                            {{ trans('cruds.pembiayaanMudharabah.fields.rate') }}
                        </th>
                        <th>
                            {{ trans('cruds.pembiayaanMudharabah.fields.penghasilan') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($result != null)
                        @foreach($result as $key => $pembiayaanMudharabah)
                        <tr data-entry-id="{{ $pembiayaanMudharabah['id'] }}">
                            <td>

                            </td>
                            <td>
                                {{ $pembiayaanMudharabah['id'] ?? '' }}
                            </td>
                            <td>
                                {{ $pembiayaanMudharabah['collection']->nama_nasabah ?? '' }}
                            </td>
                            <td>
                                {{ $pembiayaanMudharabah['collection']->nama_bank ?? '' }}
                            </td>
                            <td>
                                {{ ($pembiayaanMudharabah['collection']->kebutuhan_modal) ?? '' }}
                            </td>
                            <td>
                                {{ ($pembiayaanMudharabah['collection']->modal_nasabah) ?? '' }}
                            </td>
                            <td>
                                {{ ($pembiayaanMudharabah['collection']->proyeksi_penerimaan_perbulan) ?? '' }}
                            </td>
                            <td>
                                {{ $pembiayaanMudharabah['collection']->jangka_waktu ?? '' }}
                            </td>
                            <td>
                                {{ $pembiayaanMudharabah['collection']->rate ?? '' }}%
                            </td>
                            <td>
                                {{ ($pembiayaanMudharabah['collection']->penghasilan) ?? '' }}
                            </td>
                            <td>
                                <a class="btn btn-xs btn-primary" href="{{ route('admin.perhitungan-akads.showDetail', ['detail'=>'pembiayaan-mudharabah','code'=>$pembiayaanMudharabah['code']]) }}">
                                    {{ trans('global.view') }}
                                </a>

                                <form action="{{ route('admin.perhitungan-akads.destroy', $pembiayaanMudharabah['id']) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
            let table = $('.datatable-PembiayaanMudharabah:not(.ajaxTable)').DataTable({ buttons: dtButtons })
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        })

    </script>
@endsection
