<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreKategoriDasarHukumRequest;
use App\Http\Requests\UpdateKategoriDasarHukumRequest;
use App\Http\Resources\Admin\KategoriDasarHukumResource;
use App\Models\KategoriDasarHukum;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class KategoriDasarHukumApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('kategori_dasar_hukum_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new KategoriDasarHukumResource(KategoriDasarHukum::all());
    }

    public function store(StoreKategoriDasarHukumRequest $request)
    {
        $kategoriDasarHukum = KategoriDasarHukum::create($request->all());

        if ($request->input('baner', false)) {
            $kategoriDasarHukum->addMedia(storage_path('tmp/uploads/' . basename($request->input('baner'))))->toMediaCollection('baner');
        }

        return (new KategoriDasarHukumResource($kategoriDasarHukum))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(KategoriDasarHukum $kategoriDasarHukum)
    {
        abort_if(Gate::denies('kategori_dasar_hukum_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new KategoriDasarHukumResource($kategoriDasarHukum);
    }

    public function update(UpdateKategoriDasarHukumRequest $request, KategoriDasarHukum $kategoriDasarHukum)
    {
        $kategoriDasarHukum->update($request->all());

        if ($request->input('baner', false)) {
            if (!$kategoriDasarHukum->baner || $request->input('baner') !== $kategoriDasarHukum->baner->file_name) {
                if ($kategoriDasarHukum->baner) {
                    $kategoriDasarHukum->baner->delete();
                }
                $kategoriDasarHukum->addMedia(storage_path('tmp/uploads/' . basename($request->input('baner'))))->toMediaCollection('baner');
            }
        } elseif ($kategoriDasarHukum->baner) {
            $kategoriDasarHukum->baner->delete();
        }

        return (new KategoriDasarHukumResource($kategoriDasarHukum))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(KategoriDasarHukum $kategoriDasarHukum)
    {
        abort_if(Gate::denies('kategori_dasar_hukum_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kategoriDasarHukum->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
