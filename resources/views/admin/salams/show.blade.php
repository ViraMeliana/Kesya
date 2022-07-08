@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.salam.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.perhitungan-akads.showIndex',['detail'=>'salam']) }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.salam.fields.id') }}
                        </th>
                        <td>
                            {{ $result['id'] }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salam.fields.nama_barang') }}
                        </th>
                        <td>
                            {{ $result['collection']->nama_barang }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salam.fields.jenis_barang') }}
                        </th>
                        <td>
                            {{ $result['collection']->jenis_barang }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salam.fields.jumlah_pesanan') }}
                        </th>
                        <td>
                            {{ ($result['collection']->jumlah_pesanan) }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salam.fields.jangka_waktu') }}
                        </th>
                        <td>
                            {{ $result['collection']->jangka_waktu }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Jumlah pembiayaan pada nasabah, diserahkan saat akad
                        </th>
                        <td>
                            {{ number_format($result['collection']->jumlah_pembiayaan, 0, ',', '.') }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salam.fields.harga_beli') }}
                        </th>
                        <td>
                            {{ ($result['collection']->harga_beli) }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salam.fields.harga_jual') }}
                        </th>
                        <td>
                            {{ ($result['collection']->harga_jual) }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Total harga jual
                        </th>
                        <td>
                            {{ number_format($result['collection']->total_harga_jual, 0, ',', '.') }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Keuntungan/kerugian bank
                        </th>
                        <td>
                            {{ number_format($result['collection']->laba_bank, 0, ',', '.') }}
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-outline-warning" href="{{ route('admin.perhitungan-akads.export',['detail'=>'salam','code'=>$result['code']]) }}">
                        Download PDF
                    </a>
                </div>
            </div>
        </div>
    </div>



@endsection
