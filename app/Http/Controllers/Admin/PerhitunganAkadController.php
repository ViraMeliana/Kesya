<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPerhitunganAkadRequest;
use App\Http\Requests\StorePerhitunganAkadRequest;
use App\Http\Requests\UpdatePerhitunganAkadRequest;
use App\Models\PerhitunganAkad;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PerhitunganAkadController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('perhitungan_akad_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = PerhitunganAkad::query()->select(sprintf('%s.*', (new PerhitunganAkad())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'perhitungan_akad_show';
                $editGate = 'perhitungan_akad_edit';
                $deleteGate = 'perhitungan_akad_delete';
                $crudRoutePart = 'perhitungan-akads';

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
            $table->editColumn('collection', function ($row) {
                return $row->collection ? $row->collection : '';
            });
            $table->editColumn('property', function ($row) {
                return $row->property ? $row->property : '';
            });
            $table->editColumn('code', function ($row) {
                return $row->code ? $row->code : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.perhitunganAkads.index');
    }

    public function create()
    {
        abort_if(Gate::denies('perhitungan_akad_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.perhitunganAkads.create');
    }

    public function store(StorePerhitunganAkadRequest $request)
    {
        $perhitunganAkad = PerhitunganAkad::create($request->all());

        return redirect()->route('admin.perhitungan-akads.index');
    }

    public function edit(PerhitunganAkad $perhitunganAkad)
    {
        abort_if(Gate::denies('perhitungan_akad_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.perhitunganAkads.edit', compact('perhitunganAkad'));
    }

    public function update(UpdatePerhitunganAkadRequest $request, PerhitunganAkad $perhitunganAkad)
    {
        $perhitunganAkad->update($request->all());

        return redirect()->route('admin.perhitungan-akads.index');
    }

    public function show(PerhitunganAkad $perhitunganAkad)
    {
        abort_if(Gate::denies('perhitungan_akad_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.perhitunganAkads.show', compact('perhitunganAkad'));
    }

    public function destroy(PerhitunganAkad $perhitunganAkad)
    {
        abort_if(Gate::denies('perhitungan_akad_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $perhitunganAkad->delete();

        return back();
    }

    public function massDestroy(MassDestroyPerhitunganAkadRequest $request)
    {
        PerhitunganAkad::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
