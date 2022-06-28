<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreDasarHukumRequest;
use App\Http\Requests\UpdateDasarHukumRequest;
use App\Http\Resources\Admin\DasarHukumResource;
use App\Models\DasarHukum;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DasarHukumApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('dasar_hukum_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DasarHukumResource(DasarHukum::with(['kategori_dasar_hukum'])->get());
    }

    public function store(StoreDasarHukumRequest $request)
    {
        $dasarHukum = DasarHukum::create($request->all());

        if ($request->input('file_hukum', false)) {
            $dasarHukum->addMedia(storage_path('tmp/uploads/' . basename($request->input('file_hukum'))))->toMediaCollection('file_hukum');
        }

        return (new DasarHukumResource($dasarHukum))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(DasarHukum $dasarHukum)
    {
        abort_if(Gate::denies('dasar_hukum_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DasarHukumResource($dasarHukum->load(['kategori_dasar_hukum']));
    }

    public function update(UpdateDasarHukumRequest $request, DasarHukum $dasarHukum)
    {
        $dasarHukum->update($request->all());

        if ($request->input('file_hukum', false)) {
            if (!$dasarHukum->file_hukum || $request->input('file_hukum') !== $dasarHukum->file_hukum->file_name) {
                if ($dasarHukum->file_hukum) {
                    $dasarHukum->file_hukum->delete();
                }
                $dasarHukum->addMedia(storage_path('tmp/uploads/' . basename($request->input('file_hukum'))))->toMediaCollection('file_hukum');
            }
        } elseif ($dasarHukum->file_hukum) {
            $dasarHukum->file_hukum->delete();
        }

        return (new DasarHukumResource($dasarHukum))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(DasarHukum $dasarHukum)
    {
        abort_if(Gate::denies('dasar_hukum_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dasarHukum->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
