@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.perhitunganAkad.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.perhitungan-akads.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.perhitunganAkad.fields.id') }}
                        </th>
                        <td>
                            {{ $perhitunganAkad->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.perhitunganAkad.fields.collection') }}
                        </th>
                        <td>
                            {{ $perhitunganAkad->collection }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.perhitunganAkad.fields.property') }}
                        </th>
                        <td>
                            {{ $perhitunganAkad->property }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.perhitunganAkad.fields.code') }}
                        </th>
                        <td>
                            {{ $perhitunganAkad->code }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.perhitungan-akads.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection