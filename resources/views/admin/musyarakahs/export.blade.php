<style>
    th{
        width: 50%;
        text-align: center;
    }
    tr{
        width: 50%;
        text-align: center;
    }
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
</style>
<p style="text-align: center; font-weight: bold">{{ trans('cruds.pembiayaanMudharabah.title') }}</p>
<p style="text-align: center;">{{ $result['code'] }}</p>
<table style="width: 100%;">
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
            {{ ($result['collection']->net_sales_tahun) }}
        </td>
    </tr>
    <tr>
        <th>
            {{ trans('cruds.musyarakah.fields.hpp_pertahun') }}
        </th>
        <td>
            {{ ($result['collection']->hpp_pertahun) }}
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
            {{ ($result['collection']->nwc) }}
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
            {{ number_format($result['collection']->proyeksi_net_sales_yearly, 0, ',', '.') }}
        </td>
    </tr>
    <tr>
        <th>
            Proyeksi penjualan bersih (bulan)
        </th>
        <td>
            {{ number_format($result['collection']->proyeksi_net_sales_monthly, 0, ',', '.') }}
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
            {{ number_format($result['collection']->proyeksi_hpp_yearly, 0, ',', '.') }}
        </td>
    </tr>
    <tr>
        <th>
            Asumsi (bulan)
        </th>
        <td>
            {{ number_format($result['collection']->proyeksi_hpp_monthly, 0, ',', '.') }}
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
            {{ number_format($result['collection']->next_proyeksi_net_sales_monthly, 0, ',', '.') }}
        </td>
    </tr>
    <tr>
        <th>
            Proyeksi HPP (bulan)
        </th>
        <td>
            {{ number_format($result['collection']->next_proyeksi_hpp_monthly, 0, ',', '.') }}
        </td>
    </tr>
    <tr>
        <th>
            Last NWC
        </th>
        <td>
            {{ number_format($result['collection']->last_nwc, 0, ',', '.') }}
        </td>
    </tr>
    <tr>
        <th>
            Financial Needs
        </th>
        <td>
            {{ number_format($result['collection']->financial_needs, 0, ',', '.') }}
        </td>
    </tr>
    <tr>
        <th>
            Kebutuhan Tambahan Modal Kerja
        </th>
        <td>
            {{ number_format($result['collection']->tambahan_modal, 0, ',', '.') }}
        </td>
    </tr>
    <tr>
        <th>
            {{ trans('cruds.musyarakah.fields.pemenuhan_modal_bank') }}
        </th>
        <td>
            {{ ($result['collection']->pemenuhan_modal_bank) }}
        </td>
    </tr>
    <tr>
        <th>
            Pemenuhan Modal Nasabah
        </th>
        <td>
            {{ number_format($result['collection']->pemenuhan_modal_nasabah, 0, ',', '.') }}
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
            {{ number_format($result['collection']->outstanding_pembiayaan , 0, ',', '.')}}
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
            {{ number_format($result['collection']->proyeksi_pendapatan, 0, ',', '.') }}
        </td>
    </tr>
    <tr>
        <th>
            Proyeksi Kenaikan Pendapatan
        </th>
        <td>
            {{ $result['collection']->proyeksi_kenaikan_pendapatan }}%
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
<br>
<p style="text-align: center;">Pendapatan Nasabah Setiap Bulan</p>
<br>
<table style="width: 100%;">
    <tbody>
    <tr>
        <td style="width: 25.0000%;">Bulan</td>
        <td style="width: 25.0000%;">Pendapatan Nasabah</td>
        <td style="width: 25.0000%;">Bagi Hasil Bank</td>
        <td style="width: 25.0000%;">Bagi Hasil Nasabah</td>
    </tr>
    <?php
    $pendapatan = $result['collection']->proyeksi_pendapatan;
    $sumPendapatan = $result['collection']->proyeksi_pendapatan;
    $sumNisbah = 0;
    ?>
    @for($i=1; $i<=$result['collection']->jangka_waktu;$i++)
        <tr>
            <td style="width: 25.0000%;">{{$i}}</td>
            <td style="width: 25.0000%;">@if($i == 1)
                Rp {{ number_format($pendapatan) }}
                 @else
                <?php $pendapatan = $pendapatan*(1 + ($result['collection']->proyeksi_kenaikan_pendapatan / 100)); $sumPendapatan += $pendapatan?>
                    Rp {{number_format($pendapatan)}}
                @endif
            </td>
            <td style="width: 25.0000%;"><?php $nisbahBank =  $result['collection']->nisbah_bank/100*$pendapatan; $sumNisbah+=$nisbahBank;?>Rp {{number_format($nisbahBank)}}</td>
            <td style="width: 25.0000%;">Rp {{number_format($result['collection']->nisbah_nasabah/100*$pendapatan)}}</td>
        </tr>
    @endfor
    <tr>
        <td style="width: 25.0000%;"></td>
        <td style="width: 25.0000%;">Rp {{number_format($sumPendapatan)}}</td>
        <td style="width: 25.0000%;">Rp {{number_format($sumNisbah)}}</td>
        <td style="width: 25.0000%;"></td>
    </tr>
    <tr>
        <td style="width: 25.0000%;" colspan="2">Pembayaran Pembiayaan Pokok pada Bank di akhir periode</td>
        <td style="width: 25.0000%;" colspan="2">Rp {{number_format($result['collection']->outstanding_pembiayaan)}}</td>
    </tr>
    <tr>
        <td style="width: 25.0000%;" colspan="2">Jumlah yang dibayar nasabah</td>
        <td style="width: 25.0000%;" colspan="2">Rp {{number_format($sumNisbah+$result['collection']->outstanding_pembiayaan)}}</td>
    </tr>
    </tbody>
</table>
