@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.musyarakah.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.perhitungan-akads.calculate",['detail'=>'musyarakah']) }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="required" for="net_sales_tahun">{{ trans('cruds.musyarakah.fields.net_sales_tahun') }}</label>
                    <input class="form-control {{ $errors->has('net_sales_tahun') ? 'is-invalid' : '' }}" type="text" data-type="currency" name="net_sales_tahun" id="net_sales_tahun" value="{{ old('net_sales_tahun', '') }}" step="0.01" required>
                    @if($errors->has('net_sales_tahun'))
                        <div class="invalid-feedback">
                            {{ $errors->first('net_sales_tahun') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.musyarakah.fields.net_sales_tahun_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="hpp_pertahun">{{ trans('cruds.musyarakah.fields.hpp_pertahun') }}</label>
                    <input class="form-control {{ $errors->has('hpp_pertahun') ? 'is-invalid' : '' }}" type="text" data-type="currency" name="hpp_pertahun" id="hpp_pertahun" value="{{ old('hpp_pertahun', '') }}" required>
                    @if($errors->has('hpp_pertahun'))
                        <div class="invalid-feedback">
                            {{ $errors->first('hpp_pertahun') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.musyarakah.fields.hpp_pertahun_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="last_dr_daily">{{ trans('cruds.musyarakah.fields.last_dr_daily') }}</label>
                    <input class="form-control {{ $errors->has('last_dr_daily') ? 'is-invalid' : '' }}" type="number" name="last_dr_daily" id="last_dr_daily" value="{{ old('last_dr_daily', '') }}" step="1" required>
                    @if($errors->has('last_dr_daily'))
                        <div class="invalid-feedback">
                            {{ $errors->first('last_dr_daily') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.musyarakah.fields.last_dr_daily_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="last_di_daily">{{ trans('cruds.musyarakah.fields.last_di_daily') }}</label>
                    <input class="form-control {{ $errors->has('last_di_daily') ? 'is-invalid' : '' }}" type="number" name="last_di_daily" id="last_di_daily" value="{{ old('last_di_daily', '') }}" step="1" required>
                    @if($errors->has('last_di_daily'))
                        <div class="invalid-feedback">
                            {{ $errors->first('last_di_daily') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.musyarakah.fields.last_di_daily_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="last_dp_daily">{{ trans('cruds.musyarakah.fields.last_dp_daily') }}</label>
                    <input class="form-control {{ $errors->has('last_dp_daily') ? 'is-invalid' : '' }}" type="number" name="last_dp_daily" id="last_dp_daily" value="{{ old('last_dp_daily', '') }}" step="1" required>
                    @if($errors->has('last_dp_daily'))
                        <div class="invalid-feedback">
                            {{ $errors->first('last_dp_daily') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.musyarakah.fields.last_dp_daily_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="nwc">{{ trans('cruds.musyarakah.fields.nwc') }}</label>
                    <input class="form-control {{ $errors->has('nwc') ? 'is-invalid' : '' }}" type="text" data-type="currency" name="nwc" id="nwc" value="{{ old('nwc', '') }}"  required>
                    @if($errors->has('nwc'))
                        <div class="invalid-feedback">
                            {{ $errors->first('nwc') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.musyarakah.fields.nwc_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="asumsi_kenaikan_penjualan">{{ trans('cruds.musyarakah.fields.asumsi_kenaikan_penjualan') }}</label>
                    <input class="form-control {{ $errors->has('asumsi_kenaikan_penjualan') ? 'is-invalid' : '' }}" type="number" name="asumsi_kenaikan_penjualan" id="asumsi_kenaikan_penjualan" value="{{ old('asumsi_kenaikan_penjualan', '') }}" required>
                    @if($errors->has('asumsi_kenaikan_penjualan'))
                        <div class="invalid-feedback">
                            {{ $errors->first('asumsi_kenaikan_penjualan') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.musyarakah.fields.asumsi_kenaikan_penjualan_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="asumsi_hpp">{{ trans('cruds.musyarakah.fields.asumsi_hpp') }}</label>
                    <input class="form-control {{ $errors->has('asumsi_hpp') ? 'is-invalid' : '' }}" type="number" name="asumsi_hpp" id="asumsi_hpp" value="{{ old('asumsi_hpp', '') }}" required>
                    @if($errors->has('asumsi_hpp'))
                        <div class="invalid-feedback">
                            {{ $errors->first('asumsi_hpp') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.musyarakah.fields.asumsi_hpp_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="next_dr_daily">{{ trans('cruds.musyarakah.fields.next_dr_daily') }}</label>
                    <input class="form-control {{ $errors->has('next_dr_daily') ? 'is-invalid' : '' }}" type="number" name="next_dr_daily" id="next_dr_daily" value="{{ old('next_dr_daily', '') }}" step="1" required>
                    @if($errors->has('next_dr_daily'))
                        <div class="invalid-feedback">
                            {{ $errors->first('next_dr_daily') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.musyarakah.fields.next_dr_daily_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="next_di_daily">{{ trans('cruds.musyarakah.fields.next_di_daily') }}</label>
                    <input class="form-control {{ $errors->has('next_di_daily') ? 'is-invalid' : '' }}" type="number" name="next_di_daily" id="next_di_daily" value="{{ old('next_di_daily', '') }}" step="1" required>
                    @if($errors->has('next_di_daily'))
                        <div class="invalid-feedback">
                            {{ $errors->first('next_di_daily') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.musyarakah.fields.next_di_daily_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="next_dp_daily">{{ trans('cruds.musyarakah.fields.next_dp_daily') }}</label>
                    <input class="form-control {{ $errors->has('next_dp_daily') ? 'is-invalid' : '' }}" type="number" name="next_dp_daily" id="next_dp_daily" value="{{ old('next_dp_daily', '') }}" step="1" required>
                    @if($errors->has('next_dp_daily'))
                        <div class="invalid-feedback">
                            {{ $errors->first('next_dp_daily') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.musyarakah.fields.next_dp_daily_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="proyeksi_kenaikan_modal">{{ trans('cruds.musyarakah.fields.proyeksi_kenaikan_modal') }}</label>
                    <input class="form-control {{ $errors->has('proyeksi_kenaikan_modal') ? 'is-invalid' : '' }}" type="number" name="proyeksi_kenaikan_modal" id="proyeksi_kenaikan_modal" value="{{ old('proyeksi_kenaikan_modal', '') }}" required>
                    @if($errors->has('proyeksi_kenaikan_modal'))
                        <div class="invalid-feedback">
                            {{ $errors->first('proyeksi_kenaikan_modal') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.musyarakah.fields.proyeksi_kenaikan_modal_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="pemenuhan_modal_bank">{{ trans('cruds.musyarakah.fields.pemenuhan_modal_bank') }}</label>
                    <input class="form-control {{ $errors->has('pemenuhan_modal_bank') ? 'is-invalid' : '' }}" type="text" data-type="currency" name="pemenuhan_modal_bank" id="pemenuhan_modal_bank" value="{{ old('pemenuhan_modal_bank', '') }}" required>
                    @if($errors->has('pemenuhan_modal_bank'))
                        <div class="invalid-feedback">
                            {{ $errors->first('pemenuhan_modal_bank') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.musyarakah.fields.pemenuhan_modal_bank_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="rate">{{ trans('cruds.musyarakah.fields.rate') }}</label>
                    <input class="form-control {{ $errors->has('rate') ? 'is-invalid' : '' }}" type="number" name="rate" id="rate" value="{{ old('rate', '') }}" required>
                    @if($errors->has('rate'))
                        <div class="invalid-feedback">
                            {{ $errors->first('rate') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.musyarakah.fields.rate_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="jangka_waktu">{{ trans('cruds.musyarakah.fields.jangka_waktu') }}</label>
                    <input class="form-control {{ $errors->has('jangka_waktu') ? 'is-invalid' : '' }}" type="number" name="jangka_waktu" id="jangka_waktu" value="{{ old('jangka_waktu', '') }}" step="1" required>
                    @if($errors->has('jangka_waktu'))
                        <div class="invalid-feedback">
                            {{ $errors->first('jangka_waktu') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.musyarakah.fields.jangka_waktu_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="proyeksi_kenaikan_pendapatan">{{ trans('cruds.musyarakah.fields.proyeksi_kenaikan_pendapatan') }}</label>
                    <input class="form-control {{ $errors->has('proyeksi_kenaikan_pendapatan') ? 'is-invalid' : '' }}" type="number" name="proyeksi_kenaikan_pendapatan" id="proyeksi_kenaikan_pendapatan" value="{{ old('proyeksi_kenaikan_pendapatan', '') }}" required>
                    @if($errors->has('proyeksi_kenaikan_pendapatan'))
                        <div class="invalid-feedback">
                            {{ $errors->first('proyeksi_kenaikan_pendapatan') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.musyarakah.fields.proyeksi_kenaikan_pendapatan_helper') }}</span>
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
