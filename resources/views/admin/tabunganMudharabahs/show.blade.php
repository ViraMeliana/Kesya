@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.tabunganMudharabah.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.tabungan-mudharabahs.index') }}">
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
                            {{ $tabunganMudharabah->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabunganMudharabah.fields.nama_nasabah') }}
                        </th>
                        <td>
                            {{ $tabunganMudharabah->nama_nasabah }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabunganMudharabah.fields.nama_bank') }}
                        </th>
                        <td>
                            {{ $tabunganMudharabah->nama_bank }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabunganMudharabah.fields.nisbah_percent_nasabah') }}
                        </th>
                        <td>
                            {{ $tabunganMudharabah->nisbah_percent_nasabah }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabunganMudharabah.fields.nisbah_percent_bank') }}
                        </th>
                        <td>
                            {{ $tabunganMudharabah->nisbah_percent_bank }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabunganMudharabah.fields.tanggal') }}
                        </th>
                        <td>
                            {{ $tabunganMudharabah->tanggal }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabunganMudharabah.fields.avg_nasabah') }}
                        </th>
                        <td>
                            {{ $tabunganMudharabah->avg_nasabah }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabunganMudharabah.fields.total') }}
                        </th>
                        <td>
                            {{ $tabunganMudharabah->total }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tabunganMudharabah.fields.pendapatan') }}
                        </th>
                        <td>
                            {{ $tabunganMudharabah->pendapatan }}
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.tabungan-mudharabahs.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>



@endsection
