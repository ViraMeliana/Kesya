<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyKategoriDasarHukumRequest;
use App\Http\Requests\StoreKategoriDasarHukumRequest;
use App\Http\Requests\UpdateKategoriDasarHukumRequest;
use App\Models\KategoriDasarHukum;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class KategoriDasarHukumController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('kategori_dasar_hukum_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = KategoriDasarHukum::query()->select(sprintf('%s.*', (new KategoriDasarHukum())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'kategori_dasar_hukum_show';
                $editGate = 'kategori_dasar_hukum_edit';
                $deleteGate = 'kategori_dasar_hukum_delete';
                $crudRoutePart = 'kategori-dasar-hukums';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('nama', function ($row) {
                return $row->nama ? $row->nama : '';
            });
            $table->editColumn('baner', function ($row) {
                if ($photo = $row->baner) {
                    return sprintf(
        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
        $photo->url,
        $photo->thumbnail
    );
                }

                return '';
            });

            $table->rawColumns(['actions', 'placeholder', 'baner']);

            return $table->make(true);
        }
        $kategori = KategoriDasarHukum::all();
        return view('admin.kategoriDasarHukums.index',compact('kategori'));
    }

    public function create()
    {
        abort_if(Gate::denies('kategori_dasar_hukum_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.kategoriDasarHukums.create');
    }

    public function store(StoreKategoriDasarHukumRequest $request)
    {
        $kategoriDasarHukum = KategoriDasarHukum::create($request->all());

        if ($request->input('baner', false)) {
            $kategoriDasarHukum->addMedia(storage_path('tmp/uploads/' . basename($request->input('baner'))))->toMediaCollection('baner');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $kategoriDasarHukum->id]);
        }

        return redirect()->route('admin.kategori-dasar-hukums.index');
    }

    public function edit(KategoriDasarHukum $kategoriDasarHukum)
    {
        abort_if(Gate::denies('kategori_dasar_hukum_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.kategoriDasarHukums.edit', compact('kategoriDasarHukum'));
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

        return redirect()->route('admin.kategori-dasar-hukums.index');
    }

    public function show(KategoriDasarHukum $kategoriDasarHukum)
    {
        abort_if(Gate::denies('kategori_dasar_hukum_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kategoriDasarHukum->load('kategoriDasarHukumDasarHukums');

        return view('admin.kategoriDasarHukums.show', compact('kategoriDasarHukum'));
    }

    public function destroy(KategoriDasarHukum $kategoriDasarHukum)
    {
        abort_if(Gate::denies('kategori_dasar_hukum_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kategoriDasarHukum->delete();

        return back();
    }

    public function massDestroy(MassDestroyKategoriDasarHukumRequest $request)
    {
        KategoriDasarHukum::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('kategori_dasar_hukum_create') && Gate::denies('kategori_dasar_hukum_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new KategoriDasarHukum();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
