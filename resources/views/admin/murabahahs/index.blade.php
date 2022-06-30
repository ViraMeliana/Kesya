@extends('layouts.admin')
@section('content')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.perhitungan-akads.showCreate',['detail'=>'murabahah']) }}">
                    {{ trans('global.add') }} {{ trans('cruds.murabahah.title_singular') }}
                </a>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                {{ trans('cruds.murabahah.title_singular') }} {{ trans('global.list') }}
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class=" table table-bordered table-striped table-hover datatable datatable-Murabahah">
                        <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.murabahah.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.murabahah.fields.harga_beli') }}
                            </th>
                            <th>
                                {{ trans('cruds.murabahah.fields.presentase_dp') }}
                            </th>
                            <th>
                                {{ trans('cruds.murabahah.fields.lama_pembiayaan') }}
                            </th>
                            <th>
                                {{ trans('cruds.murabahah.fields.margin_keuntungan_bank') }}
                            </th>
                            <th>
                                {{ trans('cruds.murabahah.fields.estimasi_pembiayaan_bank') }}
                            </th>
                            <th>
                                {{ trans('cruds.murabahah.fields.estimasi_pembiayaan_tahunan') }}
                            </th>
                            <th>
                                {{ trans('cruds.murabahah.fields.jangka_waktu') }}
                            </th>
                            <th>
                                {{ trans('cruds.murabahah.fields.biaya_bank') }}
                            </th>
                            <th>
                                {{ trans('cruds.murabahah.fields.biaya_notaris') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($result != null)
                            @foreach($result as $key => $murabahah)
                            <tr data-entry-id="{{ $murabahah['id'] }}">
                                <td>

                                </td>
                                <td>
                                    {{ $murabahah['id'] ?? '' }}
                                </td>
                                <td>
                                    {{ number_format($murabahah['collection']->harga_beli) ?? '' }}
                                </td>
                                <td>
                                    {{ $murabahah['collection']->presentase_dp ?? '' }}%
                                </td>
                                <td>
                                    {{ $murabahah['collection']->lama_pembiayaan ?? '' }}
                                </td>
                                <td>
                                    {{ $murabahah['collection']->margin_keuntungan_bank ?? '' }}%
                                </td>
                                <td>
                                    {{ number_format($murabahah['collection']->estimasi_pembiayaan_bank) ?? '' }}
                                </td>
                                <td>
                                    {{ number_format($murabahah['collection']->estimasi_pembiayaan_tahunan) ?? '' }}
                                </td>
                                <td>
                                    {{ $murabahah['collection']->jangka_waktu ?? '' }}
                                </td>
                                <td>
                                    {{ number_format($murabahah['collection']->biaya_bank) ?? '' }}
                                </td>
                                <td>
                                    {{ number_format($murabahah['collection']->biaya_notaris) ?? '' }}
                                </td>
                                <td>
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.perhitungan-akads.showDetail', ['detail'=>'murabahah','code'=>$murabahah['code']]) }}">
                                        {{ trans('global.view') }}
                                    </a>

                                    <form action="{{ route('admin.perhitungan-akads.destroy', $murabahah['id']) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
            let table = $('.datatable-Murabahah:not(.ajaxTable)').DataTable({ buttons: dtButtons })
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        })

    </script>
@endsection
