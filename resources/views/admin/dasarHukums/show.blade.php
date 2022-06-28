@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.dasarHukum.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.dasar-hukums.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.dasarHukum.fields.id') }}
                        </th>
                        <td>
                            {{ $dasarHukum->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dasarHukum.fields.kategori_dasar_hukum') }}
                        </th>
                        <td>
                            {{ $dasarHukum->kategori_dasar_hukum->nama ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dasarHukum.fields.nama_hukum') }}
                        </th>
                        <td>
                            {{ $dasarHukum->nama_hukum }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dasarHukum.fields.file_hukum') }}
                        </th>
                        <td>
                            @if($dasarHukum->file_hukum)
                                <a href="{{ $dasarHukum->file_hukum->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dasarHukum.fields.slug') }}
                        </th>
                        <td>
                            {{ $dasarHukum->slug }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.dasar-hukums.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection