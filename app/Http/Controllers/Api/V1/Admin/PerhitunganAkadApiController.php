<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePerhitunganAkadRequest;
use App\Http\Requests\UpdatePerhitunganAkadRequest;
use App\Http\Resources\Admin\PerhitunganAkadResource;
use App\Models\PerhitunganAkad;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PerhitunganAkadApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('perhitungan_akad_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PerhitunganAkadResource(PerhitunganAkad::all());
    }

    public function store(StorePerhitunganAkadRequest $request)
    {
        $perhitunganAkad = PerhitunganAkad::create($request->all());

        return (new PerhitunganAkadResource($perhitunganAkad))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(PerhitunganAkad $perhitunganAkad)
    {
        abort_if(Gate::denies('perhitungan_akad_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PerhitunganAkadResource($perhitunganAkad);
    }

    public function update(UpdatePerhitunganAkadRequest $request, PerhitunganAkad $perhitunganAkad)
    {
        $perhitunganAkad->update($request->all());

        return (new PerhitunganAkadResource($perhitunganAkad))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(PerhitunganAkad $perhitunganAkad)
    {
        abort_if(Gate::denies('perhitungan_akad_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $perhitunganAkad->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
