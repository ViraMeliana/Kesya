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

    public function showIndex($detail)
    {
        abort_if(Gate::denies('perhitungan_akad_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if ($detail == "tabungan-mudharabah") {
            return view('admin.tabunganMudharabahs.index');
        } else if ($detail == "pembiayaan-mudharabah") {
            return view('admin.pembiayaanMudharabahs.index');
        }
        return true;
    }

    public function showCreate($detail)
    {
        abort_if(Gate::denies('perhitungan_akad_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if ($detail == "tabungan-mudharabah") {
            return view('admin.tabunganMudharabahs.create');
        } else if ($detail == "pembiayaan-mudharabah") {
            return view('admin.pembiayaanMudharabahs.create');
        }
        return true;
    }

    public function create()
    {
        abort_if(Gate::denies('perhitungan_akad_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.perhitunganAkads.create');
    }

    public function calculate(Request $request, $detail)
    {
        if ($detail == "tabungan-mudharabah" ) {
            $nisbah_bank = ($request->nisbah_percent_bank) * ($request->pendapatan) / 100;
            $nisbah_total_nasabah = ($request->nisbah_percent_nasabah) * ($request->pendapatan) / 100;
            $nisbah_nasabah = (($request->avg_nasabah) / ($request->total)) * ($nisbah_total_nasabah);
            $tabungan_awal = ($request->avg_nasabah) + ($nisbah_nasabah);

            $result = array('nisbah_bank'=>$nisbah_bank, 'nisbah_total_nasabah'=>$nisbah_total_nasabah,
                'nisbah_nasabah'=>$nisbah_nasabah, 'tabungan_awal'=>$tabungan_awal);
            $json = json_encode(array_merge($request->except('_token'), $result));
        } else if ($detail == "pembiayaan-mudharabah" ) {
            $proyeksi_penerimaan_pertahun = ($request->proyeksi_penerimaan_perbulan) * 12;
            $nisbah_pertahun = ($request->jangka_waktu) * ($request->rate) * ($request->kebutuhan_modal) / 100;
            $nisbah_bank = ($nisbah_pertahun) / ($proyeksi_penerimaan_pertahun) * 100;
            $nisbah_nasabah = 100 - ($nisbah_bank);
            $laba_nasabah = ($request->penghasilan) * ($nisbah_nasabah) / 100;
            $laba_bank = ($request->penghasilan) * ($nisbah_bank) / 100;

            $result = array('proyeksi_penerimaan_pertahun'=>$proyeksi_penerimaan_pertahun, 'nisbah_pertahun'=>$nisbah_pertahun,
                'nisbah_nasabah'=>round($nisbah_nasabah), 'nisbah_bank'=>round($nisbah_bank), 'laba_nasabah'=>round($laba_nasabah), 'laba_bank'=>round($laba_bank));
            $json = json_encode(array_merge($request->except('_token'), $result));
        }
//        $perhitunganAkad = PerhitunganAkad::create(['collection'=>$json, 'property' => $detail, ]);
        dd($json);
        return redirect()->route('admin.perhitungan-akads.index');
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
