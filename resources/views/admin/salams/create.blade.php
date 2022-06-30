@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.salam.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.perhitungan-akads.calculate",['detail'=>'salam']) }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="required" for="nama_barang">{{ trans('cruds.salam.fields.nama_barang') }}</label>
                    <input class="form-control {{ $errors->has('nama_barang') ? 'is-invalid' : '' }}" type="text" name="nama_barang" id="nama_barang" value="{{ old('nama_barang', '') }}" required>
                    @if($errors->has('nama_barang'))
                        <div class="invalid-feedback">
                            {{ $errors->first('nama_barang') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.salam.fields.nama_barang_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="jenis_barang">{{ trans('cruds.salam.fields.jenis_barang') }}</label>
                    <input class="form-control {{ $errors->has('jenis_barang') ? 'is-invalid' : '' }}" type="text" name="jenis_barang" id="jenis_barang" value="{{ old('jenis_barang', '') }}" required>
                    @if($errors->has('jenis_barang'))
                        <div class="invalid-feedback">
                            {{ $errors->first('jenis_barang') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.salam.fields.jenis_barang_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="jumlah_pesanan">{{ trans('cruds.salam.fields.jumlah_pesanan') }}</label>
                    <input class="form-control {{ $errors->has('jumlah_pesanan') ? 'is-invalid' : '' }}" type="number" name="jumlah_pesanan" id="jumlah_pesanan" value="{{ old('jumlah_pesanan', '') }}" step="1" required>
                    @if($errors->has('jumlah_pesanan'))
                        <div class="invalid-feedback">
                            {{ $errors->first('jumlah_pesanan') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.salam.fields.jumlah_pesanan_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="jangka_waktu">{{ trans('cruds.salam.fields.jangka_waktu') }}</label>
                    <input class="form-control {{ $errors->has('jangka_waktu') ? 'is-invalid' : '' }}" type="number" name="jangka_waktu" id="jangka_waktu" value="{{ old('jangka_waktu', '') }}" step="1" required>
                    @if($errors->has('jangka_waktu'))
                        <div class="invalid-feedback">
                            {{ $errors->first('jangka_waktu') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.salam.fields.jangka_waktu_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="harga_beli">{{ trans('cruds.salam.fields.harga_beli') }}</label>
                    <input class="form-control {{ $errors->has('harga_beli') ? 'is-invalid' : '' }}" type="number" name="harga_beli" id="harga_beli" value="{{ old('harga_beli', '') }}" step="1" required>
                    @if($errors->has('harga_beli'))
                        <div class="invalid-feedback">
                            {{ $errors->first('harga_beli') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.salam.fields.harga_beli_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="harga_jual">{{ trans('cruds.salam.fields.harga_jual') }}</label>
                    <input class="form-control {{ $errors->has('harga_jual') ? 'is-invalid' : '' }}" type="number" name="harga_jual" id="harga_jual" value="{{ old('harga_jual', '') }}" step="1" required>
                    @if($errors->has('harga_jual'))
                        <div class="invalid-feedback">
                            {{ $errors->first('harga_jual') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.salam.fields.harga_jual_helper') }}</span>
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
