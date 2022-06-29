@extends('layouts.admin')
@section('content')
    @can('perhitungan_akad_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.perhitungan-akads.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.perhitunganAkad.title_singular') }}
                </a>
            </div>
        </div>
    @endcan

    <div class="card mb-4">
        <div class="card-header"><strong>Akad</strong><span class="mb-sm-auto ms-5">&nbsp;Bagi Hasil</span></div>
        <div class="card-body">
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col">
                    <div class="card"><img class="card-img-top" src="{{asset('image/mosque_baner.jpg')}}" alt="">
                        <div class="card-body">
                            <a href="{{route('admin.perhitungan-akads.showIndex',['detail'=>'tabungan-mudharabah'])}}">
                            <h5 class="card-title">Tabungan Mudharabah</h5></a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card"><img class="card-img-top" src="{{asset('image/mosque_baner.jpg')}}" alt="">
                        <div class="card-body">
                            <a href="{{route('admin.perhitungan-akads.showIndex',['detail'=>'pembiayaan-mudharabah'])}}">
                            <h5 class="card-title">Pembiayaan Mudharabah</h5>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card"><img class="card-img-top" src="{{asset('image/mosque_baner.jpg')}}" alt="">
                        <div class="card-body">
                            <h5 class="card-title">Musyarakah</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header"><strong>Akad</strong><span class="mb-sm-auto ms-5">&nbsp;Bagi Hasil</span></div>
        <div class="card-body">
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col">
                    <div class="card"><img class="card-img-top" src="{{asset('image/mosque_baner.jpg')}}" alt="">
                        <div class="card-body">
                            <h5 class="card-title">Pembiayaan Murabahah</h5>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card"><img class="card-img-top" src="{{asset('image/mosque_baner.jpg')}}" alt="">
                        <div class="card-body">
                            <h5 class="card-title">Pembiayaan Salam</h5>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card"><img class="card-img-top" src="{{asset('image/mosque_baner.jpg')}}" alt="">
                        <div class="card-body">
                            <h5 class="card-title">Pembiayaan Istisna</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @parent
@endsection
