@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.perhitunganAkad.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.perhitungan-akads.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="collection">{{ trans('cruds.perhitunganAkad.fields.collection') }}</label>
                <input class="form-control {{ $errors->has('collection') ? 'is-invalid' : '' }}" type="text" name="collection" id="collection" value="{{ old('collection', '') }}" required>
                @if($errors->has('collection'))
                    <div class="invalid-feedback">
                        {{ $errors->first('collection') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.perhitunganAkad.fields.collection_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="property">{{ trans('cruds.perhitunganAkad.fields.property') }}</label>
                <textarea class="form-control {{ $errors->has('property') ? 'is-invalid' : '' }}" name="property" id="property">{{ old('property') }}</textarea>
                @if($errors->has('property'))
                    <div class="invalid-feedback">
                        {{ $errors->first('property') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.perhitunganAkad.fields.property_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="code">{{ trans('cruds.perhitunganAkad.fields.code') }}</label>
                <input class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}" type="text" name="code" id="code" value="{{ old('code', '') }}">
                @if($errors->has('code'))
                    <div class="invalid-feedback">
                        {{ $errors->first('code') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.perhitunganAkad.fields.code_helper') }}</span>
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