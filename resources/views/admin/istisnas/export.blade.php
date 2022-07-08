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
<p style="text-align: center; font-weight: bold">{{ trans('cruds.salam.title') }}</p>
<table style="width: 100%;">
    <tbody>
    <tr>
        <th>
            {{ trans('cruds.istina.fields.id') }}
        </th>
        <td>
            {{ $result['id'] }}
        </td>
    </tr>
    <tr>
        <th>
            {{ trans('cruds.istina.fields.nama_barang') }}
        </th>
        <td>
            {{ $result['collection']->nama_barang }}
        </td>
    </tr>
    <tr>
        <th>
            {{ trans('cruds.istina.fields.bahan') }}
        </th>
        <td>
            {{ $result['collection']->bahan }}
        </td>
    </tr>
    <tr>
        <th>
            {{ trans('cruds.istina.fields.ukuran') }}
        </th>
        <td>
            {{ $result['collection']->ukuran }}
        </td>
    </tr>
    <tr>
        <th>
            {{ trans('cruds.istina.fields.model') }}
        </th>
        <td>
            {{ $result['collection']->model }}
        </td>
    </tr>
    <tr>
        <th>
            {{ trans('cruds.istina.fields.warna') }}
        </th>
        <td>
            {{ $result['collection']->warna }}
        </td>
    </tr>
    <tr>
        <th>
            {{ trans('cruds.istina.fields.jumlah_pesanan') }}
        </th>
        <td>
            {{ ($result['collection']->jumlah_pesanan) }}
        </td>
    </tr>
    <tr>
        <th>
            {{ trans('cruds.istina.fields.harga_satuan') }}
        </th>
        <td>
            {{ ($result['collection']->harga_satuan) }}
        </td>
    </tr>
    <tr>
        <th>
            {{ trans('cruds.istina.fields.jangka_waktu') }}
        </th>
        <td>
            {{ $result['collection']->jangka_waktu }}
        </td>
    </tr>
    <tr>
        <th>
            Kebutuhan Dana Nasabah
        </th>
        <td>
            {{ number_format($result['collection']->kebutuhan, 0, ',', '.') }}
        </td>
    </tr>
    <tr>
        <th>
            {{ trans('cruds.istina.fields.biaya_bank') }}
        </th>
        <td>
            {{ ($result['collection']->biaya_bank) }}
        </td>
    </tr>
    <tr>
        <th colspan="2">
            Pembayaran secara tangguh pada bank di akhir periode
        </th>
    </tr>
    <tr>
        <th>
            Pembiayaan dan Biaya Bank
        </th>
        <td>
            {{ number_format($result['collection']->total_pembiayaan, 0, ',', '.') }}
        </td>
    </tr>
    <tr>
        <th>
            {{ trans('cruds.istina.fields.margin_keuntungan_istisna') }}
        </th>
        <td>
            {{ $result['collection']->margin_keuntungan_istisna }}%
        </td>
    </tr>
    <tr>
        <th>
            Keuntungan Bank
        </th>
        <td>
            {{ number_format($result['collection']->keuntungan_bank_akhir, 0, ',', '.') }}
        </td>
    </tr>
    <tr>
        <th>
            Jumlah yang dibayar nasabah di akhir periode
        </th>
        <td>
            {{ number_format($result['collection']->pembayaran_akhir, 0, ',', '.') }}
        </td>
    </tr>
    <tr>
        <th colspan="2">
            Pembayaran secara angsuran per bulan
        </th>
    </tr>
    <tr>
        <th>
            {{ trans('cruds.istina.fields.margin_keuntungan_perbulan') }}
        </th>
        <td>
            {{ $result['collection']->margin_keuntungan_perbulan }}%
        </td>
    </tr>
    <tr>
        <th>
            Keuntungan bank
        </th>
        <td>
            {{ number_format($result['collection']->keuntungan_bank_perbulan, 0, ',', '.') }}
        </td>
    </tr>
    <tr>
        <th>
            Angsuran per bulan
        </th>
        <td>
            {{ number_format($result['collection']->angsuran_perbulan, 0, ',', '.') }}
        </td>
    </tr>
    <tr>
        <th>
            Pembayaran pertama
        </th>
        <td>
            {{ number_format($result['collection']->pembayaran_pertama, 0, ',', '.') }}
        </td>
    </tr>
    </tbody>
</table>
<br>
<p style="text-align: center; font-weight: bold">Detail Angsuran</p>
<br>
<table style="width: 100%;">
    <tbody>
    <tr>
        <td style="width: 10%;">Bulan</td>
        <td style="width: 16%;">Plafond Pembiayaan</td>
        <td style="width: 16%;">Sisa Pokok</td>
        <td style="width: 16%;">Porsi Pokok</td>
        <td style="width: 16%;">Porsi Margin</td>
        <td style="width: 16%;">Angsuran</td>
        <td style="width: 10%;">Margin</td>
    </tr>
    <tr>
        <td style="width: 10%;">0</td>
        <td style="width: 16%;">Rp{{ number_format($result['collection']->kebutuhan) }}</td>
        <td style="width: 16%;">Rp{{ number_format($result['collection']->kebutuhan) }}</td>
        <td style="width: 16%;">Rp0</td>
        <td style="width: 16%;">-</td>
        <td style="width: 16%;">Rp0</td>
        <td style="width: 10%;">{{ $result['collection']->margin_keuntungan_istisna }}%</td>
    </tr>
    <?php
    $sisaPokok = $result['collection']->kebutuhan;
    ?>
    @for($i=1;$i<=$result['collection']->jangka_waktu;$i++)
        <?php
        $porsiMargin = $sisaPokok*$result['collection']->margin_keuntungan_istisna/100*(30/360);
        $porsiPokok = $result['collection']->angsuran_perbulan - $porsiMargin;
        ?>
        <tr>
            <td style="width: 10%;">{{$i}}</td>
            <td style="width: 16%;"></td>
            <td style="width: 16%;"><?php $sisaPokok =  $sisaPokok - $porsiPokok?>Rp{{number_format($sisaPokok, 0, ',', '.')}}</td>
            <td style="width: 16%;">Rp{{ number_format($porsiPokok, 0, ',', '.') }}</td>
            <td style="width: 16%;">Rp{{number_format($porsiMargin, 0, ',', '.')}}</td>
            <td style="width: 16%;">Rp{{number_format($result['collection']->angsuran_perbulan, 0, ',', '.')}}</td>
            <td style="width: 10%;">{{ $result['collection']->margin_keuntungan_istisna }}%</td>
        </tr>
    @endfor
    </tbody>
</table>
