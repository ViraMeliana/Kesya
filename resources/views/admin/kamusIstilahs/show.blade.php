@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.kamusIstilah.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.kamus-istilahs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.kamusIstilah.fields.id') }}
                        </th>
                        <td>
                            {{ $kamusIstilah->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.kamusIstilah.fields.istilah') }}
                        </th>
                        <td>
                            {{ $kamusIstilah->istilah }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.kamusIstilah.fields.detail') }}
                        </th>
                        <td>
                            {{ $kamusIstilah->detail }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.kamus-istilahs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection