@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.murabahah.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.perhitungan-akads.showIndex',['detail'=>'murabahah']) }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.murabahah.fields.id') }}
                        </th>
                        <td>
                            {{ $result['id'] }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.murabahah.fields.harga_beli') }}
                        </th>
                        <td>
                            {{ ($result['collection']->harga_beli) }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.murabahah.fields.presentase_dp') }}
                        </th>
                        <td>
                            {{ $result['collection']->presentase_dp }}%
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Uang muka
                        </th>
                        <td>
                            {{ number_format($result['collection']->uang_muka, 0, ',', '.') }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Jumlah pembiayaan bank
                        </th>
                        <td>
                            {{ number_format($result['collection']->pembiayaan_bank, 0, ',', '.') }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.murabahah.fields.lama_pembiayaan') }}
                        </th>
                        <td>
                            {{ $result['collection']->lama_pembiayaan }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.murabahah.fields.margin_keuntungan_bank') }}
                        </th>
                        <td>
                            {{ $result['collection']->margin_keuntungan_bank }}%
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.murabahah.fields.estimasi_pembiayaan_bank') }}
                        </th>
                        <td>
                            {{ ($result['collection']->estimasi_pembiayaan_bank) }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.murabahah.fields.estimasi_pembiayaan_tahunan') }}
                        </th>
                        <td>
                            {{ ($result['collection']->estimasi_pembiayaan_tahunan) }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.murabahah.fields.jangka_waktu') }}
                        </th>
                        <td>
                            {{ $result['collection']->jangka_waktu }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Cost recovery = (pembiayaan murabahah/estimasi total pembiayaan)x estimasi biaya operasi 1 tahun
                        </th>
                        <td>
                            {{ number_format($result['collection']->cost_recovery, 0, ',', '.') }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Margin keuntungan= ...% x pembiayaan
                        </th>
                        <td>
                            {{ number_format($result['collection']->margin_keuntungan, 0, ',', '.') }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Harga jual bank = pembiayaan + (waktu x cost recovery) + margin
                        </th>
                        <td>
                            {{ number_format($result['collection']->harga_jual, 0, ',', '.') }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Angsuran pembiayaan = harga jual/jangka waktu dalam bulan
                        </th>
                        <td>
                            {{ number_format($result['collection']->angsuran, 0, ',', '.') }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Margin dalam persentase / tahun
                        </th>
                        <td>
                            {{ round($result['collection']->margin,2) }}%
                        </td>
                    </tr>
                    <tr>
                        <th>
                            lama pinjaman (dalam bulan)
                        </th>
                        <td>
                            {{ $result['collection']->lama_pinjam }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            jumlah pinjaman maksimal
                        </th>
                        <td>
                            {{ number_format($result['collection']->jumlah_pinjaman, 0, ',', '.') }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Uang muka (DP)
                        </th>
                        <td>
                            {{ number_format($result['collection']->uang_muka, 0, ',', '.') }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.murabahah.fields.biaya_bank') }}
                        </th>
                        <td>
                            {{ ($result['collection']->biaya_bank) }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.murabahah.fields.biaya_notaris') }}
                        </th>
                        <td>
                            {{ ($result['collection']->biaya_notaris) }}
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
                            Pembayaran pertama (Angusran + DP + biaya bank+ total notaris)
                        </th>
                        <td>
                            {{ number_format($result['collection']->pembayaran_pertama, 0, ',', '.') }}
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-outline-warning" href="{{ route('admin.perhitungan-akads.export',['detail'=>'murabahah','code'=>$result['code']]) }}">
                        Download PDF
                    </a>
                </div>
            </div>
        </div>
    </div>



@endsection
