@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.istina.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.perhitungan-akads.showIndex',['detail'=>'istisna']) }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
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
                <div class="form-group">
                    <a class="btn btn-outline-warning" href="{{ route('admin.perhitungan-akads.export',['detail'=>'istisna','code'=>$result['code']]) }}">
                        Download PDF
                    </a>
                </div>
            </div>
        </div>
    </div>



@endsection
