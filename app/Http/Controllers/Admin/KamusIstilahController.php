<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyKamusIstilahRequest;
use App\Http\Requests\StoreKamusIstilahRequest;
use App\Http\Requests\UpdateKamusIstilahRequest;
use App\Models\KamusIstilah;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class KamusIstilahController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('kamus_istilah_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = KamusIstilah::query()->select(sprintf('%s.*', (new KamusIstilah())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'kamus_istilah_show';
                $editGate = 'kamus_istilah_edit';
                $deleteGate = 'kamus_istilah_delete';
                $crudRoutePart = 'kamus-istilahs';

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
            $table->editColumn('istilah', function ($row) {
                return $row->istilah ? $row->istilah : '';
            });
            $table->editColumn('detail', function ($row) {
                return $row->detail ? $row->detail : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.kamusIstilahs.index');
    }

    public function create()
    {
        abort_if(Gate::denies('kamus_istilah_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.kamusIstilahs.create');
    }

    public function store(StoreKamusIstilahRequest $request)
    {
        $kamusIstilah = KamusIstilah::create($request->all());

        return redirect()->route('admin.kamus-istilahs.index');
    }

    public function edit(KamusIstilah $kamusIstilah)
    {
        abort_if(Gate::denies('kamus_istilah_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.kamusIstilahs.edit', compact('kamusIstilah'));
    }

    public function update(UpdateKamusIstilahRequest $request, KamusIstilah $kamusIstilah)
    {
        $kamusIstilah->update($request->all());

        return redirect()->route('admin.kamus-istilahs.index');
    }

    public function show(KamusIstilah $kamusIstilah)
    {
        abort_if(Gate::denies('kamus_istilah_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.kamusIstilahs.show', compact('kamusIstilah'));
    }

    public function destroy(KamusIstilah $kamusIstilah)
    {
        abort_if(Gate::denies('kamus_istilah_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kamusIstilah->delete();

        return back();
    }

    public function massDestroy(MassDestroyKamusIstilahRequest $request)
    {
        KamusIstilah::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
