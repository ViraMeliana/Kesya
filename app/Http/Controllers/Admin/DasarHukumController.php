<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyDasarHukumRequest;
use App\Http\Requests\StoreDasarHukumRequest;
use App\Http\Requests\UpdateDasarHukumRequest;
use App\Models\DasarHukum;
use App\Models\KategoriDasarHukum;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class DasarHukumController extends Controller
{
    use MediaUploadingTrait;

    public function index($id = null)
    {
        abort_if(Gate::denies('dasar_hukum_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dasarHukums = DasarHukum::with(['kategori_dasar_hukum', 'media'])->where('kategori_dasar_hukum_id',$id)->get();

        return view('admin.dasarHukums.index', compact('dasarHukums'));
    }

    public function create()
    {
        abort_if(Gate::denies('dasar_hukum_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kategori_dasar_hukums = KategoriDasarHukum::pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.dasarHukums.create', compact('kategori_dasar_hukums'));
    }

    public function store(StoreDasarHukumRequest $request)
    {
        $dasarHukum = DasarHukum::create($request->all());

        if ($request->input('file_hukum', false)) {
            $dasarHukum->addMedia(storage_path('tmp/uploads/' . basename($request->input('file_hukum'))))->toMediaCollection('file_hukum');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $dasarHukum->id]);
        }

        return redirect()->route('admin.dasar-hukums.index');
    }

    public function edit(DasarHukum $dasarHukum)
    {
        abort_if(Gate::denies('dasar_hukum_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kategori_dasar_hukums = KategoriDasarHukum::pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dasarHukum->load('kategori_dasar_hukum');

        return view('admin.dasarHukums.edit', compact('dasarHukum', 'kategori_dasar_hukums'));
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

        return redirect()->route('admin.dasar-hukums.index');
    }

    public function show(DasarHukum $dasarHukum)
    {
        abort_if(Gate::denies('dasar_hukum_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dasarHukum->load('kategori_dasar_hukum');

        return view('admin.dasarHukums.show', compact('dasarHukum'));
    }

    public function destroy(DasarHukum $dasarHukum)
    {
        abort_if(Gate::denies('dasar_hukum_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dasarHukum->delete();

        return back();
    }

    public function massDestroy(MassDestroyDasarHukumRequest $request)
    {
        DasarHukum::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('dasar_hukum_create') && Gate::denies('dasar_hukum_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new DasarHukum();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
