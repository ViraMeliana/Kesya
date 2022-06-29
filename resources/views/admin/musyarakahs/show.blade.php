@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.musyarakah.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.musyarakahs.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.musyarakah.fields.id') }}
                        </th>
                        <td>
                            {{ $musyarakah->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.musyarakah.fields.net_sales_tahun') }}
                        </th>
                        <td>
                            {{ $musyarakah->net_sales_tahun }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.musyarakah.fields.hpp_pertahun') }}
                        </th>
                        <td>
                            {{ $musyarakah->hpp_pertahun }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.musyarakah.fields.last_dr_daily') }}
                        </th>
                        <td>
                            {{ $musyarakah->last_dr_daily }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.musyarakah.fields.last_di_daily') }}
                        </th>
                        <td>
                            {{ $musyarakah->last_di_daily }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.musyarakah.fields.last_dp_daily') }}
                        </th>
                        <td>
                            {{ $musyarakah->last_dp_daily }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.musyarakah.fields.nwc') }}
                        </th>
                        <td>
                            {{ $musyarakah->nwc }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.musyarakah.fields.asumsi_kenaikan_penjualan') }}
                        </th>
                        <td>
                            {{ $musyarakah->asumsi_kenaikan_penjualan }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.musyarakah.fields.asumsi_hpp') }}
                        </th>
                        <td>
                            {{ $musyarakah->asumsi_hpp }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.musyarakah.fields.next_dr_daily') }}
                        </th>
                        <td>
                            {{ $musyarakah->next_dr_daily }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.musyarakah.fields.next_di_daily') }}
                        </th>
                        <td>
                            {{ $musyarakah->next_di_daily }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.musyarakah.fields.next_dp_daily') }}
                        </th>
                        <td>
                            {{ $musyarakah->next_dp_daily }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.musyarakah.fields.proyeksi_kenaikan_modal') }}
                        </th>
                        <td>
                            {{ $musyarakah->proyeksi_kenaikan_modal }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.musyarakah.fields.pemenuhan_modal_bank') }}
                        </th>
                        <td>
                            {{ $musyarakah->pemenuhan_modal_bank }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.musyarakah.fields.rate') }}
                        </th>
                        <td>
                            {{ $musyarakah->rate }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.musyarakah.fields.jangka_waktu') }}
                        </th>
                        <td>
                            {{ $musyarakah->jangka_waktu }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.musyarakah.fields.proyeksi_kenaikan_pendapatan') }}
                        </th>
                        <td>
                            {{ $musyarakah->proyeksi_kenaikan_pendapatan }}
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.musyarakahs.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>



@endsection
