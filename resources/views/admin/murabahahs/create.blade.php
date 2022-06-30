@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.murabahah.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.perhitungan-akads.calculate",['detail'=>'murabahah']) }}" enctype="multipart/form-data">
                @csrf
                @csrf
                <div class="form-group">
                    <label class="required" for="harga_beli">{{ trans('cruds.murabahah.fields.harga_beli') }}</label>
                    <input class="form-control {{ $errors->has('harga_beli') ? 'is-invalid' : '' }}" type="number" name="harga_beli" id="harga_beli" value="{{ old('harga_beli', '') }}" step="1" required>
                    @if($errors->has('harga_beli'))
                        <div class="invalid-feedback">
                            {{ $errors->first('harga_beli') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.murabahah.fields.harga_beli_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="presentase_dp">{{ trans('cruds.murabahah.fields.presentase_dp') }}</label>
                    <input class="form-control {{ $errors->has('presentase_dp') ? 'is-invalid' : '' }}" type="number" name="presentase_dp" id="presentase_dp" value="{{ old('presentase_dp', '') }}" step="1" required>
                    @if($errors->has('presentase_dp'))
                        <div class="invalid-feedback">
                            {{ $errors->first('presentase_dp') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.murabahah.fields.presentase_dp_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="lama_pembiayaan">{{ trans('cruds.murabahah.fields.lama_pembiayaan') }}</label>
                    <input class="form-control {{ $errors->has('lama_pembiayaan') ? 'is-invalid' : '' }}" type="number" name="lama_pembiayaan" id="lama_pembiayaan" value="{{ old('lama_pembiayaan', '') }}" step="1" required>
                    @if($errors->has('lama_pembiayaan'))
                        <div class="invalid-feedback">
                            {{ $errors->first('lama_pembiayaan') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.murabahah.fields.lama_pembiayaan_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="margin_keuntungan_bank">{{ trans('cruds.murabahah.fields.margin_keuntungan_bank') }}</label>
                    <input class="form-control {{ $errors->has('margin_keuntungan_bank') ? 'is-invalid' : '' }}" type="number" name="margin_keuntungan_bank" id="margin_keuntungan_bank" value="{{ old('margin_keuntungan_bank', '') }}" step="1" required>
                    @if($errors->has('margin_keuntungan_bank'))
                        <div class="invalid-feedback">
                            {{ $errors->first('margin_keuntungan_bank') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.murabahah.fields.margin_keuntungan_bank_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="estimasi_pembiayaan_bank">{{ trans('cruds.murabahah.fields.estimasi_pembiayaan_bank') }}</label>
                    <input class="form-control {{ $errors->has('estimasi_pembiayaan_bank') ? 'is-invalid' : '' }}" type="number" name="estimasi_pembiayaan_bank" id="estimasi_pembiayaan_bank" value="{{ old('estimasi_pembiayaan_bank', '') }}" step="1" required>
                    @if($errors->has('estimasi_pembiayaan_bank'))
                        <div class="invalid-feedback">
                            {{ $errors->first('estimasi_pembiayaan_bank') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.murabahah.fields.estimasi_pembiayaan_bank_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="estimasi_pembiayaan_tahunan">{{ trans('cruds.murabahah.fields.estimasi_pembiayaan_tahunan') }}</label>
                    <input type="number" class="form-control {{ $errors->has('estimasi_pembiayaan_tahunan') ? 'is-invalid' : '' }}" name="estimasi_pembiayaan_tahunan" id="estimasi_pembiayaan_tahunan" value="{{ old('estimasi_pembiayaan_tahunan') }}" required>
                    @if($errors->has('estimasi_pembiayaan_tahunan'))
                        <div class="invalid-feedback">
                            {{ $errors->first('estimasi_pembiayaan_tahunan') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.murabahah.fields.estimasi_pembiayaan_tahunan_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="jangka_waktu">{{ trans('cruds.murabahah.fields.jangka_waktu') }}</label>
                    <input class="form-control {{ $errors->has('jangka_waktu') ? 'is-invalid' : '' }}" type="number" name="jangka_waktu" id="jangka_waktu" value="{{ old('jangka_waktu', '') }}" step="1" required>
                    @if($errors->has('jangka_waktu'))
                        <div class="invalid-feedback">
                            {{ $errors->first('jangka_waktu') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.murabahah.fields.jangka_waktu_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="biaya_bank">{{ trans('cruds.murabahah.fields.biaya_bank') }}</label>
                    <input class="form-control {{ $errors->has('biaya_bank') ? 'is-invalid' : '' }}" type="number" name="biaya_bank" id="biaya_bank" value="{{ old('biaya_bank', '') }}" step="1" required>
                    @if($errors->has('biaya_bank'))
                        <div class="invalid-feedback">
                            {{ $errors->first('biaya_bank') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.murabahah.fields.biaya_bank_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="biaya_notaris">{{ trans('cruds.murabahah.fields.biaya_notaris') }}</label>
                    <input class="form-control {{ $errors->has('biaya_notaris') ? 'is-invalid' : '' }}" type="number" name="biaya_notaris" id="biaya_notaris" value="{{ old('biaya_notaris', '') }}" step="1" required>
                    @if($errors->has('biaya_notaris'))
                        <div class="invalid-feedback">
                            {{ $errors->first('biaya_notaris') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.murabahah.fields.biaya_notaris_helper') }}</span>
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
