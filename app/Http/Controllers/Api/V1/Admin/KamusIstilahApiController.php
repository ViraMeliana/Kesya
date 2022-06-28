<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreKamusIstilahRequest;
use App\Http\Requests\UpdateKamusIstilahRequest;
use App\Http\Resources\Admin\KamusIstilahResource;
use App\Models\KamusIstilah;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class KamusIstilahApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('kamus_istilah_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new KamusIstilahResource(KamusIstilah::all());
    }

    public function store(StoreKamusIstilahRequest $request)
    {
        $kamusIstilah = KamusIstilah::create($request->all());

        return (new KamusIstilahResource($kamusIstilah))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(KamusIstilah $kamusIstilah)
    {
        abort_if(Gate::denies('kamus_istilah_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new KamusIstilahResource($kamusIstilah);
    }

    public function update(UpdateKamusIstilahRequest $request, KamusIstilah $kamusIstilah)
    {
        $kamusIstilah->update($request->all());

        return (new KamusIstilahResource($kamusIstilah))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(KamusIstilah $kamusIstilah)
    {
        abort_if(Gate::denies('kamus_istilah_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kamusIstilah->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
