@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.pembiayaanMudharabah.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.perhitungan-akads.calculate",['detail'=>'pembiayaan-mudharabah']) }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="required" for="jenis_usaha">{{ trans('cruds.pembiayaanMudharabah.fields.jenis_usaha') }}</label>
                    <input class="form-control {{ $errors->has('jenis_usaha') ? 'is-invalid' : '' }}" type="text" name="jenis_usaha" id="jenis_usaha" value="{{ old('jenis_usaha', '') }}" required>
                    @if($errors->has('jenis_usaha'))
                        <div class="invalid-feedback">
                            {{ $errors->first('jenis_usaha') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.pembiayaanMudharabah.fields.jenis_usaha_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="nama_nasabah">{{ trans('cruds.pembiayaanMudharabah.fields.nama_nasabah') }}</label>
                    <input class="form-control {{ $errors->has('nama_nasabah') ? 'is-invalid' : '' }}" type="text" name="nama_nasabah" id="nama_nasabah" value="{{ old('nama_nasabah', '') }}" required>
                    @if($errors->has('nama_nasabah'))
                        <div class="invalid-feedback">
                            {{ $errors->first('nama_nasabah') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.pembiayaanMudharabah.fields.nama_nasabah_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="nama_bank">{{ trans('cruds.pembiayaanMudharabah.fields.nama_bank') }}</label>
                    <input class="form-control {{ $errors->has('nama_bank') ? 'is-invalid' : '' }}" type="text" name="nama_bank" id="nama_bank" value="{{ old('nama_bank', '') }}" required>
                    @if($errors->has('nama_bank'))
                        <div class="invalid-feedback">
                            {{ $errors->first('nama_bank') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.pembiayaanMudharabah.fields.nama_bank_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="kebutuhan_modal">{{ trans('cruds.pembiayaanMudharabah.fields.kebutuhan_modal') }}</label>
                    <input class="form-control {{ $errors->has('kebutuhan_modal') ? 'is-invalid' : '' }}" type="number" name="kebutuhan_modal" id="kebutuhan_modal" value="{{ old('kebutuhan_modal', '') }}" required>
                    @if($errors->has('kebutuhan_modal'))
                        <div class="invalid-feedback">
                            {{ $errors->first('kebutuhan_modal') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.pembiayaanMudharabah.fields.kebutuhan_modal_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="modal_nasabah">{{ trans('cruds.pembiayaanMudharabah.fields.modal_nasabah') }}</label>
                    <input class="form-control {{ $errors->has('modal_nasabah') ? 'is-invalid' : '' }}" type="number" name="modal_nasabah" id="modal_nasabah" value="{{ old('modal_nasabah', '') }}" required>
                    @if($errors->has('modal_nasabah'))
                        <div class="invalid-feedback">
                            {{ $errors->first('modal_nasabah') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.pembiayaanMudharabah.fields.modal_nasabah_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="proyeksi_penerimaan_perbulan">{{ trans('cruds.pembiayaanMudharabah.fields.proyeksi_penerimaan_perbulan') }}</label>
                    <input class="form-control {{ $errors->has('proyeksi_penerimaan_perbulan') ? 'is-invalid' : '' }}" type="number" name="proyeksi_penerimaan_perbulan" id="proyeksi_penerimaan_perbulan" value="{{ old('proyeksi_penerimaan_perbulan', '') }}" required>
                    @if($errors->has('proyeksi_penerimaan_perbulan'))
                        <div class="invalid-feedback">
                            {{ $errors->first('proyeksi_penerimaan_perbulan') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.pembiayaanMudharabah.fields.proyeksi_penerimaan_perbulan_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="jangka_waktu">{{ trans('cruds.pembiayaanMudharabah.fields.jangka_waktu') }}</label>
                    <input class="form-control {{ $errors->has('jangka_waktu') ? 'is-invalid' : '' }}" type="number" name="jangka_waktu" id="jangka_waktu" value="{{ old('jangka_waktu', '') }}" step="1" required>
                    @if($errors->has('jangka_waktu'))
                        <div class="invalid-feedback">
                            {{ $errors->first('jangka_waktu') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.pembiayaanMudharabah.fields.jangka_waktu_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="rate">{{ trans('cruds.pembiayaanMudharabah.fields.rate') }}</label>
                    <input class="form-control {{ $errors->has('rate') ? 'is-invalid' : '' }}" type="number" name="rate" id="rate" value="{{ old('rate', '') }}" required>
                    @if($errors->has('rate'))
                        <div class="invalid-feedback">
                            {{ $errors->first('rate') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.pembiayaanMudharabah.fields.rate_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="penghasilan">{{ trans('cruds.pembiayaanMudharabah.fields.penghasilan') }}</label>
                    <input class="form-control {{ $errors->has('penghasilan') ? 'is-invalid' : '' }}" type="number" name="penghasilan" id="penghasilan" value="{{ old('penghasilan', '') }}" required>
                    @if($errors->has('penghasilan'))
                        <div class="invalid-feedback">
                            {{ $errors->first('penghasilan') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.pembiayaanMudharabah.fields.penghasilan_helper') }}</span>
                </div>
                <div class="form-group">
                    <button class="btn btn-danger" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>



@endsection
