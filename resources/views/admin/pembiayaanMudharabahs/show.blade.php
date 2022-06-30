@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.pembiayaanMudharabah.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.perhitungan-akads.showIndex',['detail'=>'pembiayaan-mudharabah']) }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.pembiayaanMudharabah.fields.id') }}
                        </th>
                        <td>
                            {{ $result['id']  }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pembiayaanMudharabah.fields.nama_nasabah') }}
                        </th>
                        <td>
                            {{ $result['collection']->nama_nasabah }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pembiayaanMudharabah.fields.nama_bank') }}
                        </th>
                        <td>
                            {{ $result['collection']->nama_bank }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pembiayaanMudharabah.fields.kebutuhan_modal') }}
                        </th>
                        <td>
                            {{ number_format($result['collection']->kebutuhan_modal) }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Pembiayaan Bank
                        </th>
                        <td>
                            {{ number_format($result['collection']->kebutuhan_modal) }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pembiayaanMudharabah.fields.modal_nasabah') }}
                        </th>
                        <td>
                            {{ number_format($result['collection']->modal_nasabah) }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pembiayaanMudharabah.fields.proyeksi_penerimaan_perbulan') }}
                        </th>
                        <td>
                            {{ number_format($result['collection']->proyeksi_penerimaan_perbulan) }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Proyeksi Penerimaan Perbulan
                        </th>
                        <td>
                            {{ number_format($result['collection']->proyeksi_penerimaan_pertahun) }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pembiayaanMudharabah.fields.jangka_waktu') }}
                        </th>
                        <td>
                            {{ $result['collection']->jangka_waktu }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pembiayaanMudharabah.fields.rate') }}
                        </th>
                        <td>
                            {{ $result['collection']->rate }}%
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Ekpektasi bagi hasil per tahun (Rp)
                        </th>
                        <td>
                            {{ number_format($result['collection']->nisbah_pertahun) }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Nisbah bank (%)
                        </th>
                        <td>
                            {{ $result['collection']->nisbah_bank }}%
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Nisbah nasabah (%)
                        </th>
                        <td>
                            {{ $result['collection']->nisbah_nasabah }}%
                        </td>
                    </tr>
                    <tr>
                        <th colspan="2">
                            Perhitungan bagi hasil riil yang dibayarkan nasabah
                        </th>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pembiayaanMudharabah.fields.penghasilan') }}
                        </th>
                        <td>
                            {{ number_format($result['collection']->penghasilan) }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Bagi Hasil Laba/Rugi Nasabah
                        </th>
                        <td>
                            {{ number_format($result['collection']->laba_nasabah) }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Bagi Hasil Laba/Rugi Bank
                        </th>
                        <td>
                            {{ number_format($result['collection']->laba_bank) }}
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>



@endsection
