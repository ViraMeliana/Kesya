@extends('layouts.admin')
@section('content')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.perhitungan-akads.showCreate',['detail'=>'musyarakah']) }}">
                {{ trans('global.add') }} {{ trans('cruds.musyarakah.title_singular') }}
            </a>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.musyarakah.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-Musyarakah">
                    <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.musyarakah.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.musyarakah.fields.net_sales_tahun') }}
                        </th>
                        <th>
                            {{ trans('cruds.musyarakah.fields.hpp_pertahun') }}
                        </th>
                        <th>
                            {{ trans('cruds.musyarakah.fields.last_dr_daily') }}
                        </th>
                        <th>
                            {{ trans('cruds.musyarakah.fields.last_di_daily') }}
                        </th>
                        <th>
                            {{ trans('cruds.musyarakah.fields.last_dp_daily') }}
                        </th>
                        <th>
                            {{ trans('cruds.musyarakah.fields.nwc') }}
                        </th>
                        <th>
                            {{ trans('cruds.musyarakah.fields.asumsi_kenaikan_penjualan') }}
                        </th>
                        <th>
                            {{ trans('cruds.musyarakah.fields.asumsi_hpp') }}
                        </th>
                        <th>
                            {{ trans('cruds.musyarakah.fields.next_dr_daily') }}
                        </th>
                        <th>
                            {{ trans('cruds.musyarakah.fields.next_di_daily') }}
                        </th>
                        <th>
                            {{ trans('cruds.musyarakah.fields.next_dp_daily') }}
                        </th>
                        <th>
                            {{ trans('cruds.musyarakah.fields.proyeksi_kenaikan_modal') }}
                        </th>
                        <th>
                            {{ trans('cruds.musyarakah.fields.pemenuhan_modal_bank') }}
                        </th>
                        <th>
                            {{ trans('cruds.musyarakah.fields.rate') }}
                        </th>
                        <th>
                            {{ trans('cruds.musyarakah.fields.jangka_waktu') }}
                        </th>
                        <th>
                            {{ trans('cruds.musyarakah.fields.proyeksi_kenaikan_pendapatan') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($result != null)
                        @foreach($result as $key => $musyarakah)
                        <tr data-entry-id="{{ $musyarakah['id'] }}">
                            <td>

                            </td>
                            <td>
                                {{ $musyarakah['id'] ?? '' }}
                            </td>
                            <td>
                                {{ number_format($musyarakah['collection']->net_sales_tahun) ?? '' }}
                            </td>
                            <td>
                                {{ number_format($musyarakah['collection']->hpp_pertahun )?? '' }}
                            </td>
                            <td>
                                {{ $musyarakah['collection']->last_dr_daily ?? '' }}
                            </td>
                            <td>
                                {{ $musyarakah['collection']->last_di_daily ?? '' }}
                            </td>
                            <td>
                                {{ $musyarakah['collection']->last_dp_daily ?? '' }}
                            </td>
                            <td>
                                {{ number_format($musyarakah['collection']->nwc) ?? '' }}
                            </td>
                            <td>
                                {{ $musyarakah['collection']->asumsi_kenaikan_penjualan ?? '' }}%
                            </td>
                            <td>
                                {{ $musyarakah['collection']->asumsi_hpp ?? '' }}%
                            </td>
                            <td>
                                {{ $musyarakah['collection']->next_dr_daily ?? '' }}
                            </td>
                            <td>
                                {{ $musyarakah['collection']->next_di_daily ?? '' }}
                            </td>
                            <td>
                                {{ $musyarakah['collection']->next_dp_daily ?? '' }}
                            </td>
                            <td>
                                {{ $musyarakah['collection']->proyeksi_kenaikan_modal ?? '' }}
                            </td>
                            <td>
                                {{ number_format($musyarakah['collection']->pemenuhan_modal_bank) ?? '' }}
                            </td>
                            <td>
                                {{ $musyarakah['collection']->rate ?? '' }}%
                            </td>
                            <td>
                                {{ $musyarakah['collection']->jangka_waktu ?? '' }}
                            </td>
                            <td>
                                {{ $musyarakah['collection']->proyeksi_kenaikan_pendapatan ?? '' }}%
                            </td>
                            <td>
                                <a class="btn btn-xs btn-primary" href="{{ route('admin.perhitungan-akads.showDetail', ['detail'=>'musyarakah','code'=>$musyarakah['code']]) }}">
                                    {{ trans('global.view') }}
                                </a>

                                <form action="{{ route('admin.perhitungan-akads.destroy', $musyarakah['id']) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
            let table = $('.datatable-Musyarakah:not(.ajaxTable)').DataTable({ buttons: dtButtons })
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        })

    </script>
@endsection
