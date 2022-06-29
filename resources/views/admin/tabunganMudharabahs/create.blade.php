@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.tabunganMudharabah.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.perhitungan-akads.calculate",['detail'=>'tabungan-mudharabah']) }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="required" for="nama_nasabah">{{ trans('cruds.tabunganMudharabah.fields.nama_nasabah') }}</label>
                    <input class="form-control {{ $errors->has('nama_nasabah') ? 'is-invalid' : '' }}" type="text" name="nama_nasabah" id="nama_nasabah" value="{{ old('nama_nasabah', '') }}" required>
                    @if($errors->has('nama_nasabah'))
                        <div class="invalid-feedback">
                            {{ $errors->first('nama_nasabah') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.tabunganMudharabah.fields.nama_nasabah_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="nama_bank">{{ trans('cruds.tabunganMudharabah.fields.nama_bank') }}</label>
                    <input class="form-control {{ $errors->has('nama_bank') ? 'is-invalid' : '' }}" type="text" name="nama_bank" id="nama_bank" value="{{ old('nama_bank', '') }}" required>
                    @if($errors->has('nama_bank'))
                        <div class="invalid-feedback">
                            {{ $errors->first('nama_bank') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.tabunganMudharabah.fields.nama_bank_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="nisbah_percent_nasabah">{{ trans('cruds.tabunganMudharabah.fields.nisbah_percent_nasabah') }}</label>
                    <input class="form-control {{ $errors->has('nisbah_percent_nasabah') ? 'is-invalid' : '' }}" type="number" name="nisbah_percent_nasabah" id="nisbah_percent_nasabah" value="{{ old('nisbah_percent_nasabah', '') }}" step="0.01" required>
                    @if($errors->has('nisbah_percent_nasabah'))
                        <div class="invalid-feedback">
                            {{ $errors->first('nisbah_percent_nasabah') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.tabunganMudharabah.fields.nisbah_percent_nasabah_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="nisbah_percent_bank">{{ trans('cruds.tabunganMudharabah.fields.nisbah_percent_bank') }}</label>
                    <input class="form-control {{ $errors->has('nisbah_percent_bank') ? 'is-invalid' : '' }}" type="number" name="nisbah_percent_bank" id="nisbah_percent_bank" value="{{ old('nisbah_percent_bank', '') }}" step="0.01" required>
                    @if($errors->has('nisbah_percent_bank'))
                        <div class="invalid-feedback">
                            {{ $errors->first('nisbah_percent_bank') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.tabunganMudharabah.fields.nisbah_percent_bank_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="tanggal">{{ trans('cruds.tabunganMudharabah.fields.tanggal') }}</label>
                    <input class="form-control date {{ $errors->has('tanggal') ? 'is-invalid' : '' }}" type="text" name="tanggal" id="tanggal" value="{{ old('tanggal') }}" required>
                    @if($errors->has('tanggal'))
                        <div class="invalid-feedback">
                            {{ $errors->first('tanggal') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.tabunganMudharabah.fields.tanggal_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="avg_nasabah">{{ trans('cruds.tabunganMudharabah.fields.avg_nasabah') }}</label>
                    <input class="form-control {{ $errors->has('avg_nasabah') ? 'is-invalid' : '' }}" type="number" name="avg_nasabah" id="avg_nasabah" value="{{ old('avg_nasabah', '') }}" required>
                    @if($errors->has('avg_nasabah'))
                        <div class="invalid-feedback">
                            {{ $errors->first('avg_nasabah') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.tabunganMudharabah.fields.avg_nasabah_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="total">{{ trans('cruds.tabunganMudharabah.fields.total') }}</label>
                    <input class="form-control {{ $errors->has('total') ? 'is-invalid' : '' }}" type="number" name="total" id="total" value="{{ old('total', '') }}" required>
                    @if($errors->has('total'))
                        <div class="invalid-feedback">
                            {{ $errors->first('total') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.tabunganMudharabah.fields.total_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="pendapatan">{{ trans('cruds.tabunganMudharabah.fields.pendapatan') }}</label>
                    <input class="form-control {{ $errors->has('pendapatan') ? 'is-invalid' : '' }}" type="number" name="pendapatan" id="pendapatan" value="{{ old('pendapatan', '') }}" required>
                    @if($errors->has('pendapatan'))
                        <div class="invalid-feedback">
                            {{ $errors->first('pendapatan') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.tabunganMudharabah.fields.pendapatan_helper') }}</span>
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
