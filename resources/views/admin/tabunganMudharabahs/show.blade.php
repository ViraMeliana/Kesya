@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.tabunganMudharabah.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.perhitungan-akads.showIndex',['detail'=>'tabungan-mudharabah']) }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.tabunganMudharabah.fields.id') }}
                        </th>
                        <td>
                            {{ $result['id'] }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabunganMudharabah.fields.nama_nasabah') }}
                        </th>
                        <td>
                            {{ $result['collection']->nama_nasabah }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabunganMudharabah.fields.nama_bank') }}
                        </th>
                        <td>
                            {{ $result['collection']->nama_bank }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabunganMudharabah.fields.nisbah_percent_nasabah') }}
                        </th>
                        <td>
                            {{ $result['collection']->nisbah_percent_nasabah }}%
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabunganMudharabah.fields.nisbah_percent_bank') }}
                        </th>
                        <td>
                            {{ $result['collection']->nisbah_percent_bank }}%
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabunganMudharabah.fields.tanggal') }}
                        </th>
                        <td>
                            {{ $result['collection']->tanggal }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabunganMudharabah.fields.avg_nasabah') }}
                        </th>
                        <td>
                            {{ number_format($result['collection']->avg_nasabah) }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabunganMudharabah.fields.total') }}
                        </th>
                        <td>
                            {{ number_format($result['collection']->total) }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabunganMudharabah.fields.pendapatan') }}
                        </th>
                        <td>
                            {{ number_format($result['collection']->pendapatan) }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Bagi Hasil untuk Bank
                        </th>
                        <td>
                            {{ number_format($result['collection']->nisbah_bank) }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Bagi Hasil untuk Semua Nasabah Penabung
                        </th>
                        <td>
                            {{ number_format($result['collection']->nisbah_total_nasabah) }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Bagi Hasil untuk nasabah {{ $result['collection']->nama_nasabah }}
                        </th>
                        <td>
                            {{ number_format($result['collection']->nisbah_nasabah) }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Tabungan Nasabah {{ $result['collection']->nama_nasabah }} pada awal bulan selanjutnya
                        </th>
                        <td>
                            {{ number_format($result['collection']->tabungan_awal) }}
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>



@endsection
