@extends('layouts.admin')
@section('content')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.perhitungan-akads.showCreate',['detail'=>'tabungan-mudharabah']) }}">
                {{ trans('global.add') }} {{ trans('cruds.tabunganMudharabah.title_singular') }}
            </a>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.tabunganMudharabah.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-TabunganMudharabah">
                    <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.tabunganMudharabah.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.tabunganMudharabah.fields.nama_nasabah') }}
                        </th>
                        <th>
                            {{ trans('cruds.tabunganMudharabah.fields.nama_bank') }}
                        </th>
                        <th>
                            {{ trans('cruds.tabunganMudharabah.fields.nisbah_percent_nasabah') }}
                        </th>
                        <th>
                            {{ trans('cruds.tabunganMudharabah.fields.nisbah_percent_bank') }}
                        </th>
                        <th>
                            {{ trans('cruds.tabunganMudharabah.fields.tanggal') }}
                        </th>
                        <th>
                            {{ trans('cruds.tabunganMudharabah.fields.avg_nasabah') }}
                        </th>
                        <th>
                            {{ trans('cruds.tabunganMudharabah.fields.total') }}
                        </th>
                        <th>
                            {{ trans('cruds.tabunganMudharabah.fields.pendapatan') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($result != null)
                        @foreach($result as $key => $tabunganMudharabah)
                            <tr data-entry-id="{{ $tabunganMudharabah['id'] }}">
                                <td>

                                </td>
                                <td>
                                    {{ $tabunganMudharabah['id'] ?? '' }}
                                </td>
                                <td>
                                    {{ $tabunganMudharabah['collection']->nama_nasabah ?? '' }}
                                </td>
                                <td>
                                    {{ $tabunganMudharabah['collection']->nama_bank ?? '' }}
                                </td>
                                <td>
                                    {{ $tabunganMudharabah['collection']->nisbah_percent_nasabah ?? '' }}%
                                </td>
                                <td>
                                    {{ $tabunganMudharabah['collection']->nisbah_percent_bank ?? '' }}%
                                </td>
                                <td>
                                    {{ $tabunganMudharabah['collection']->tanggal ?? '' }}
                                </td>
                                <td>
                                    {{ ($tabunganMudharabah['collection']->avg_nasabah )?? '' }}
                                </td>
                                <td>
                                    {{ ($tabunganMudharabah['collection']->total) ?? '' }}
                                </td>
                                <td>
                                    {{ ($tabunganMudharabah['collection']->pendapatan) ?? '' }}
                                </td>
                                <td>
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.perhitungan-akads.showDetail', ['detail'=>'tabungan-mudharabah','code'=>$tabunganMudharabah['code']]) }}">
                                        {{ trans('global.view') }}
                                    </a>

                                    <form action="{{ route('admin.perhitungan-akads.destroy', $tabunganMudharabah['id']) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
            let table = $('.datatable-TabunganMudharabah:not(.ajaxTable)').DataTable({ buttons: dtButtons })
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        })

    </script>
@endsection
