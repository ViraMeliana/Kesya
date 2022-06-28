@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.dasarHukum.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.dasar-hukums.update", [$dasarHukum->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="kategori_dasar_hukum_id">{{ trans('cruds.dasarHukum.fields.kategori_dasar_hukum') }}</label>
                <select class="form-control select2 {{ $errors->has('kategori_dasar_hukum') ? 'is-invalid' : '' }}" name="kategori_dasar_hukum_id" id="kategori_dasar_hukum_id" required>
                    @foreach($kategori_dasar_hukums as $id => $entry)
                        <option value="{{ $id }}" {{ (old('kategori_dasar_hukum_id') ? old('kategori_dasar_hukum_id') : $dasarHukum->kategori_dasar_hukum->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('kategori_dasar_hukum'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kategori_dasar_hukum') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dasarHukum.fields.kategori_dasar_hukum_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nama_hukum">{{ trans('cruds.dasarHukum.fields.nama_hukum') }}</label>
                <input class="form-control {{ $errors->has('nama_hukum') ? 'is-invalid' : '' }}" type="text" name="nama_hukum" id="nama_hukum" value="{{ old('nama_hukum', $dasarHukum->nama_hukum) }}" required>
                @if($errors->has('nama_hukum'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nama_hukum') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dasarHukum.fields.nama_hukum_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="file_hukum">{{ trans('cruds.dasarHukum.fields.file_hukum') }}</label>
                <div class="needsclick dropzone {{ $errors->has('file_hukum') ? 'is-invalid' : '' }}" id="file_hukum-dropzone">
                </div>
                @if($errors->has('file_hukum'))
                    <div class="invalid-feedback">
                        {{ $errors->first('file_hukum') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dasarHukum.fields.file_hukum_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.fileHukumDropzone = {
    url: '{{ route('admin.dasar-hukums.storeMedia') }}',
    maxFilesize: 2, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2
    },
    success: function (file, response) {
      $('form').find('input[name="file_hukum"]').remove()
      $('form').append('<input type="hidden" name="file_hukum" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="file_hukum"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($dasarHukum) && $dasarHukum->file_hukum)
      var file = {!! json_encode($dasarHukum->file_hukum) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="file_hukum" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@endsection
