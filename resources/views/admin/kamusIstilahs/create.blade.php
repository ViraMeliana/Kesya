@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.kamusIstilah.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.kamus-istilahs.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="istilah">{{ trans('cruds.kamusIstilah.fields.istilah') }}</label>
                <input class="form-control {{ $errors->has('istilah') ? 'is-invalid' : '' }}" type="text" name="istilah" id="istilah" value="{{ old('istilah', '') }}" required>
                @if($errors->has('istilah'))
                    <div class="invalid-feedback">
                        {{ $errors->first('istilah') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.kamusIstilah.fields.istilah_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="detail">{{ trans('cruds.kamusIstilah.fields.detail') }}</label>
                <textarea class="form-control {{ $errors->has('detail') ? 'is-invalid' : '' }}" name="detail" id="detail" required>{{ old('detail') }}</textarea>
                @if($errors->has('detail'))
                    <div class="invalid-feedback">
                        {{ $errors->first('detail') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.kamusIstilah.fields.detail_helper') }}</span>
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