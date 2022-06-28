@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.kategoriDasarHukum.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.kategori-dasar-hukums.update", [$kategoriDasarHukum->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="nama">{{ trans('cruds.kategoriDasarHukum.fields.nama') }}</label>
                <input class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}" type="text" name="nama" id="nama" value="{{ old('nama', $kategoriDasarHukum->nama) }}" required>
                @if($errors->has('nama'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nama') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.kategoriDasarHukum.fields.nama_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="baner">{{ trans('cruds.kategoriDasarHukum.fields.baner') }}</label>
                <div class="needsclick dropzone {{ $errors->has('baner') ? 'is-invalid' : '' }}" id="baner-dropzone">
                </div>
                @if($errors->has('baner'))
                    <div class="invalid-feedback">
                        {{ $errors->first('baner') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.kategoriDasarHukum.fields.baner_helper') }}</span>
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
    Dropzone.options.banerDropzone = {
    url: '{{ route('admin.kategori-dasar-hukums.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="baner"]').remove()
      $('form').append('<input type="hidden" name="baner" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="baner"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($kategoriDasarHukum) && $kategoriDasarHukum->baner)
      var file = {!! json_encode($kategoriDasarHukum->baner) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="baner" value="' + file.file_name + '">')
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