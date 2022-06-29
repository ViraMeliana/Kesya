@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.pembiayaanMudharabah.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.pembiayaan-mudharabahs.index') }}">
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
                            {{ $pembiayaanMudharabah->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pembiayaanMudharabah.fields.nama_nasabah') }}
                        </th>
                        <td>
                            {{ $pembiayaanMudharabah->nama_nasabah }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pembiayaanMudharabah.fields.nama_bank') }}
                        </th>
                        <td>
                            {{ $pembiayaanMudharabah->nama_bank }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pembiayaanMudharabah.fields.kebutuhan_modal') }}
                        </th>
                        <td>
                            {{ $pembiayaanMudharabah->kebutuhan_modal }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pembiayaanMudharabah.fields.modal_nasabah') }}
                        </th>
                        <td>
                            {{ $pembiayaanMudharabah->modal_nasabah }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pembiayaanMudharabah.fields.proyeksi_penerimaan_perbulan') }}
                        </th>
                        <td>
                            {{ $pembiayaanMudharabah->proyeksi_penerimaan_perbulan }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pembiayaanMudharabah.fields.jangka_waktu') }}
                        </th>
                        <td>
                            {{ $pembiayaanMudharabah->jangka_waktu }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pembiayaanMudharabah.fields.rate') }}
                        </th>
                        <td>
                            {{ $pembiayaanMudharabah->rate }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pembiayaanMudharabah.fields.penghasilan') }}
                        </th>
                        <td>
                            {{ $pembiayaanMudharabah->penghasilan }}
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.pembiayaan-mudharabahs.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>



@endsection
