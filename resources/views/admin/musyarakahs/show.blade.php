@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.musyarakah.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.perhitungan-akads.showIndex',['detail'=>'musyarakah']) }}">
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
                            {{ $result['id'] }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.musyarakah.fields.net_sales_tahun') }}
                        </th>
                        <td>
                            {{ number_format($result['collection']->net_sales_tahun) }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.musyarakah.fields.hpp_pertahun') }}
                        </th>
                        <td>
                            {{ number_format($result['collection']->hpp_pertahun) }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Persentage HPP terhadap penjualan
                        </th>
                        <td>
                            {{ $result['collection']->last_persentase_hpp }}%
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.musyarakah.fields.last_dr_daily') }}
                        </th>
                        <td>
                            {{ $result['collection']->last_dr_daily }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Lama piutang (bulan)
                        </th>
                        <td>
                            {{ $result['collection']->last_dr_monthly }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.musyarakah.fields.last_di_daily') }}
                        </th>
                        <td>
                            {{ $result['collection']->last_di_daily }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Lama persediaan (bulan)
                        </th>
                        <td>
                            {{ $result['collection']->last_di_monthly }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.musyarakah.fields.last_dp_daily') }}
                        </th>
                        <td>
                            {{ $result['collection']->last_dp_daily }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Lama utang dagang (bulan)
                        </th>
                        <td>
                            {{ $result['collection']->last_dp_monthly }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.musyarakah.fields.nwc') }}
                        </th>
                        <td>
                            {{ number_format($result['collection']->nwc) }}
                        </td>
                    </tr>
                    <tr>
                        <th colspan="2">
                            Proyeksi keuangan nasabah tahun berikutnya
                        </th>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.musyarakah.fields.asumsi_kenaikan_penjualan') }}
                        </th>
                        <td>
                            {{ $result['collection']->asumsi_kenaikan_penjualan }}%
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Proyeksi penjualan bersih (tahun)
                        </th>
                        <td>
                            {{ number_format($result['collection']->proyeksi_net_sales_yearly) }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Proyeksi penjualan bersih (bulan)
                        </th>
                        <td>
                            {{ number_format($result['collection']->proyeksi_net_sales_monthly) }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.musyarakah.fields.asumsi_hpp') }}
                        </th>
                        <td>
                            {{ $result['collection']->asumsi_hpp }}%
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Asumsi (tahun)
                        </th>
                        <td>
                            {{ number_format($result['collection']->proyeksi_hpp_yearly) }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Asumsi (bulan)
                        </th>
                        <td>
                            {{ number_format($result['collection']->proyeksi_hpp_monthly) }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.musyarakah.fields.next_dr_daily') }}
                        </th>
                        <td>
                            {{ $result['collection']->next_dr_daily }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Proyeksi Lama piutang (bulan)
                        </th>
                        <td>
                            {{ $result['collection']->next_dr_monthly }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.musyarakah.fields.next_di_daily') }}
                        </th>
                        <td>
                            {{ $result['collection']->next_di_daily }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Proyeksi Lama Persediaan (bulan)
                        </th>
                        <td>
                            {{ $result['collection']->next_di_monthly }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.musyarakah.fields.next_dp_daily') }}
                        </th>
                        <td>
                            {{ $result['collection']->next_dp_daily }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Proyeksi Lama Utang Dagang (bulan)
                        </th>
                        <td>
                            {{ $result['collection']->next_dp_monthly }}
                        </td>
                    </tr>
                    <tr>
                        <th colspan="2">
                            Perhitungan kebutuhan modal kerja
                        </th>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.musyarakah.fields.proyeksi_kenaikan_modal') }}
                        </th>
                        <td>
                            {{ $result['collection']->proyeksi_kenaikan_modal }}%
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Proyeksi penjualan bersih (bulan)
                        </th>
                        <td>
                            {{ number_format($result['collection']->next_proyeksi_net_sales_monthly) }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Proyeksi HPP (bulan)
                        </th>
                        <td>
                            {{ number_format($result['collection']->next_proyeksi_hpp_monthly) }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Last NWC
                        </th>
                        <td>
                            {{ number_format($result['collection']->last_nwc) }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Financial Needs
                        </th>
                        <td>
                            {{ number_format($result['collection']->financial_needs) }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Kebutuhan Tambahan Modal Kerja
                        </th>
                        <td>
                            {{ number_format($result['collection']->tambahan_modal) }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.musyarakah.fields.pemenuhan_modal_bank') }}
                        </th>
                        <td>
                            {{ number_format($result['collection']->pemenuhan_modal_bank) }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                           Pemenuhan Modal Nasabah
                        </th>
                        <td>
                            {{ number_format($result['collection']->pemenuhan_modal_nasabah) }}
                        </td>
                    </tr>
                    <tr>
                        <th colspan="2">
                            Perhitungan bagi hasil pembiayaan Musyarakah
                        </th>
                    </tr>
                    <tr>
                        <th>
                            Outstanding pembiayaan
                        </th>
                        <td>
                            {{ number_format($result['collection']->outstanding_pembiayaan )}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.musyarakah.fields.rate') }}
                        </th>
                        <td>
                            {{ $result['collection']->rate }}%
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.musyarakah.fields.jangka_waktu') }}
                        </th>
                        <td>
                            {{ $result['collection']->jangka_waktu }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Proyeksi pendapatan (bulan pertama)
                        </th>
                        <td>
                            {{ number_format($result['collection']->proyeksi_pendapatan) }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Nisbah Bagi Hasil untuk Bank
                        </th>
                        <td>
                            {{ $result['collection']->nisbah_bank }}%
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Nisbah bagi hasil untuk nasabah sisa dari bagi hasil untuk bank
                        </th>
                        <td>
                            {{ $result['collection']->nisbah_nasabah }}%
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>



@endsection
