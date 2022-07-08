@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.istina.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.perhitungan-akads.calculate",['detail'=>'istisna']) }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="required" for="nama_barang">{{ trans('cruds.istina.fields.nama_barang') }}</label>
                    <input class="form-control {{ $errors->has('nama_barang') ? 'is-invalid' : '' }}" type="text" name="nama_barang" id="nama_barang" value="{{ old('nama_barang', '') }}" required>
                    @if($errors->has('nama_barang'))
                        <div class="invalid-feedback">
                            {{ $errors->first('nama_barang') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.istina.fields.nama_barang_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="bahan">{{ trans('cruds.istina.fields.bahan') }}</label>
                    <input class="form-control {{ $errors->has('bahan') ? 'is-invalid' : '' }}" type="text" name="bahan" id="bahan" value="{{ old('bahan', '') }}" required>
                    @if($errors->has('bahan'))
                        <div class="invalid-feedback">
                            {{ $errors->first('bahan') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.istina.fields.bahan_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="ukuran">{{ trans('cruds.istina.fields.ukuran') }}</label>
                    <input class="form-control {{ $errors->has('ukuran') ? 'is-invalid' : '' }}" type="text" name="ukuran" id="ukuran" value="{{ old('ukuran', '') }}" required>
                    @if($errors->has('ukuran'))
                        <div class="invalid-feedback">
                            {{ $errors->first('ukuran') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.istina.fields.ukuran_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="model">{{ trans('cruds.istina.fields.model') }}</label>
                    <input class="form-control {{ $errors->has('model') ? 'is-invalid' : '' }}" type="text" name="model" id="model" value="{{ old('model', '') }}" required>
                    @if($errors->has('model'))
                        <div class="invalid-feedback">
                            {{ $errors->first('model') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.istina.fields.model_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="warna">{{ trans('cruds.istina.fields.warna') }}</label>
                    <input class="form-control {{ $errors->has('warna') ? 'is-invalid' : '' }}" type="text" name="warna" id="warna" value="{{ old('warna', '') }}" required>
                    @if($errors->has('warna'))
                        <div class="invalid-feedback">
                            {{ $errors->first('warna') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.istina.fields.warna_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="jumlah_pesanan">{{ trans('cruds.istina.fields.jumlah_pesanan') }}</label>
                    <input class="form-control {{ $errors->has('jumlah_pesanan') ? 'is-invalid' : '' }}" type="text" data-type="currency" name="jumlah_pesanan" id="jumlah_pesanan" value="{{ old('jumlah_pesanan', '') }}" step="1" required>
                    @if($errors->has('jumlah_pesanan'))
                        <div class="invalid-feedback">
                            {{ $errors->first('jumlah_pesanan') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.istina.fields.jumlah_pesanan_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="harga_satuan">{{ trans('cruds.istina.fields.harga_satuan') }}</label>
                    <input class="form-control {{ $errors->has('harga_satuan') ? 'is-invalid' : '' }}" type="text" data-type="currency" name="harga_satuan" id="harga_satuan" value="{{ old('harga_satuan', '') }}" step="1" required>
                    @if($errors->has('harga_satuan'))
                        <div class="invalid-feedback">
                            {{ $errors->first('harga_satuan') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.istina.fields.harga_satuan_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="jangka_waktu">{{ trans('cruds.istina.fields.jangka_waktu') }}</label>
                    <input class="form-control {{ $errors->has('jangka_waktu') ? 'is-invalid' : '' }}" type="number" name="jangka_waktu" id="jangka_waktu" value="{{ old('jangka_waktu', '') }}" step="1" required>
                    @if($errors->has('jangka_waktu'))
                        <div class="invalid-feedback">
                            {{ $errors->first('jangka_waktu') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.istina.fields.jangka_waktu_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="biaya_bank">{{ trans('cruds.istina.fields.biaya_bank') }}</label>
                    <input class="form-control {{ $errors->has('biaya_bank') ? 'is-invalid' : '' }}" type="text" data-type="currency" name="biaya_bank" id="biaya_bank" value="{{ old('biaya_bank', '') }}" step="1" required>
                    @if($errors->has('biaya_bank'))
                        <div class="invalid-feedback">
                            {{ $errors->first('biaya_bank') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.istina.fields.biaya_bank_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="margin_keuntungan_istisna">{{ trans('cruds.istina.fields.margin_keuntungan_istisna') }}</label>
                    <input class="form-control {{ $errors->has('margin_keuntungan_istisna') ? 'is-invalid' : '' }}" type="number" name="margin_keuntungan_istisna" id="margin_keuntungan_istisna" value="{{ old('margin_keuntungan_istisna', '') }}" step="1" required>
                    @if($errors->has('margin_keuntungan_istisna'))
                        <div class="invalid-feedback">
                            {{ $errors->first('margin_keuntungan_istisna') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.istina.fields.margin_keuntungan_istisna_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="margin_keuntungan_perbulan">{{ trans('cruds.istina.fields.margin_keuntungan_perbulan') }}</label>
                    <input class="form-control {{ $errors->has('margin_keuntungan_perbulan') ? 'is-invalid' : '' }}" type="number" name="margin_keuntungan_perbulan" id="margin_keuntungan_perbulan" value="{{ old('margin_keuntungan_perbulan', '') }}" step="1" required>
                    @if($errors->has('margin_keuntungan_perbulan'))
                        <div class="invalid-feedback">
                            {{ $errors->first('margin_keuntungan_perbulan') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.istina.fields.margin_keuntungan_perbulan_helper') }}</span>
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
