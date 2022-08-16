<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPerhitunganAkadRequest;
use App\Http\Requests\StorePerhitunganAkadRequest;
use App\Http\Requests\UpdatePerhitunganAkadRequest;
use App\Models\PerhitunganAkad;
use Barryvdh\DomPDF\Facade\Pdf;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        abort_if(Gate::denies('perhitungan_akad_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if (Auth::user()->getAuthIdentifier() == 1) {
            $perhitungan = PerhitunganAkad::with('user')->where('property', $detail)->get();
        } else {
            $perhitungan = PerhitunganAkad::with('user')->where('property', $detail)->where('user_id',Auth::id())->get();
        }
        $result = null;
        foreach ($perhitungan as $item) {
            $result[] = ['collection'=>json_decode($item['collection']),'code'=>$item['code'],'property'=>$item['property'],'id'=>$item['id']];
        }
        if ($detail == "tabungan-mudharabah") {
            return view('admin.tabunganMudharabahs.index', compact('result'));
        } else if ($detail == "pembiayaan-mudharabah") {
            return view('admin.pembiayaanMudharabahs.index', compact('result'));
        } else if ($detail == "musyarakah") {
            return view('admin.musyarakahs.index', compact('result'));
        } else if ($detail == "murabahah") {
            return view('admin.murabahahs.index', compact('result'));
        } else if ($detail == "istisna") {
            return view('admin.istisnas.index', compact('result'));
        } else if ($detail == "salam") {
            return view('admin.salams.index', compact('result'));
        }
        return true;
    }

    public function export($detail, $code)
    {
        abort_if(Gate::denies('perhitungan_akad_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $perhitungan = PerhitunganAkad::with('user')->where('property', $detail)->where('code',$code)->first();
        $result = ['collection'=>json_decode($perhitungan['collection']),'code'=>$perhitungan['code'],
            'property'=>$perhitungan['property'],'id'=>$perhitungan['id']];

        if ($detail == "tabungan-mudharabah") {
            $pdf = PDF::loadview('admin.tabunganMudharabahs.export',compact('result'));
        } else if ($detail == "pembiayaan-mudharabah") {
            $pdf = PDF::loadview('admin.pembiayaanMudharabahs.export',compact('result'));
        } else if ($detail == "musyarakah") {
            $pdf = PDF::loadview('admin.musyarakahs.export',compact('result'));
        } else if ($detail == "murabahah") {
            $pdf = PDF::loadview('admin.murabahahs.export',compact('result'));
        } else if ($detail == "istisna") {
            $pdf = PDF::loadview('admin.istisnas.export',compact('result'));
        } else if ($detail == "salam") {
            $pdf = PDF::loadview('admin.salams.export',compact('result'));
        }
        return $pdf->download('cetak-perhitungan.pdf');
    }

    public function showDetail($detail, $code)
    {
        abort_if(Gate::denies('perhitungan_akad_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $perhitungan = PerhitunganAkad::with('user')->where('property', $detail)->where('code',$code)->first();
        $result = ['collection'=>json_decode($perhitungan['collection']),'code'=>$perhitungan['code'],
            'property'=>$perhitungan['property'],'id'=>$perhitungan['id']];
        if ($detail == "tabungan-mudharabah") {
            return view('admin.tabunganMudharabahs.show', compact('result'));
        } else if ($detail == "pembiayaan-mudharabah") {
            return view('admin.pembiayaanMudharabahs.show', compact('result'));
        } else if ($detail == "musyarakah") {
            return view('admin.musyarakahs.show', compact('result'));
        } else if ($detail == "murabahah") {
            return view('admin.murabahahs.show', compact('result'));
        } else if ($detail == "istisna") {
            return view('admin.istisnas.show', compact('result'));
        } else if ($detail == "salam") {
            return view('admin.salams.show', compact('result'));
        }
        return true;
    }

    public function showCreate($detail)
    {
        abort_if(Gate::denies('perhitungan_akad_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if ($detail == "tabungan-mudharabah") {
            return view('admin.tabunganMudharabahs.create');
        } else if ($detail == "pembiayaan-mudharabah") {
            return view('admin.pembiayaanMudharabahs.create');
        } else if ($detail == "musyarakah") {
            return view('admin.musyarakahs.create');
        } else if ($detail == "murabahah") {
            return view('admin.murabahahs.create');
        } else if ($detail == "istisna") {
            return view('admin.istisnas.create');
        } else if ($detail == "salam") {
            return view('admin.salams.create');
        }
        return true;
    }

    function unique_code()
    {
        return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 10);
    }

    function checkUniqueCode()
    {
        $code = $this->unique_code();
        if (count(PerhitunganAkad::where('code', $this->unique_code())->get()) == 0) {
            return $code;
        } else {
            $this->checkUniqueCode();
        }
        return true;
    }
    function removeSpecialChar($str){

        // Using preg_replace() function
        // to replace the word
        $res = preg_replace('/[^a-zA-Z0-9_ -]/s','',$str);

        // Returning the result
        return $res;
    }
    public function calculate(StorePerhitunganAkadRequest $request, $detail)
    {
        if ($detail == "tabungan-mudharabah" ) {
            $request->avg_nasabah = $this->removeSpecialChar($request->avg_nasabah);
            $request->total = $this->removeSpecialChar($request->total);
            $request->pendapatan = $this->removeSpecialChar($request->pendapatan);

            $nisbah_bank = ($request->nisbah_percent_bank) * ($request->pendapatan) / 100;
            $nisbah_total_nasabah = ($request->nisbah_percent_nasabah) * ($request->pendapatan) / 100;
            $nisbah_nasabah = (($request->avg_nasabah) / ($request->total)) * ($nisbah_total_nasabah);
            $tabungan_awal = ($request->avg_nasabah) + ($nisbah_nasabah);

            $result = array('nisbah_bank'=>$nisbah_bank, 'nisbah_total_nasabah'=>$nisbah_total_nasabah,
                'nisbah_nasabah'=>$nisbah_nasabah, 'tabungan_awal'=>$tabungan_awal);
        } else if ($detail == "pembiayaan-mudharabah" ) {
            $request->kebutuhan_modal = $this->removeSpecialChar($request->kebutuhan_modal);
            $request->modal_nasabah = $this->removeSpecialChar($request->modal_nasabah);
            $request->proyeksi_penerimaan_perbulan = $this->removeSpecialChar($request->proyeksi_penerimaan_perbulan);
            $request->penghasilan = $this->removeSpecialChar($request->penghasilan);

            $proyeksi_penerimaan_pertahun = ($request->proyeksi_penerimaan_perbulan) * 12;
            $nisbah_pertahun = ($request->jangka_waktu) * ($request->rate) * ($request->kebutuhan_modal) / 100;
            $nisbah_bank = ($nisbah_pertahun) / ($proyeksi_penerimaan_pertahun) * 100;
            $nisbah_nasabah = 100 - ($nisbah_bank);
            $laba_nasabah = ($request->penghasilan) * ($nisbah_nasabah) / 100;
            $laba_bank = ($request->penghasilan) * ($nisbah_bank) / 100;

            $result = array('proyeksi_penerimaan_pertahun'=>$proyeksi_penerimaan_pertahun, 'nisbah_pertahun'=>$nisbah_pertahun,
                'nisbah_nasabah'=>round($nisbah_nasabah), 'nisbah_bank'=>round($nisbah_bank), 'laba_nasabah'=>round($laba_nasabah), 'laba_bank'=>round($laba_bank));
        }  else if ($detail == "musyarakah" ) {
            $request->net_sales_tahun = $this->removeSpecialChar($request->net_sales_tahun);
            $request->hpp_pertahun = $this->removeSpecialChar($request->hpp_pertahun);
            $request->nwc = $this->removeSpecialChar($request->nwc);
            $request->pemenuhan_modal_bank = $this->removeSpecialChar($request->pemenuhan_modal_bank);

            $last_persentase_hpp = ($request->hpp_pertahun) / ($request->net_sales_tahun);
            $last_dr_monthly = ($request->last_dr_daily) / 30;
            $last_di_monthly = ($request->last_di_daily) / 30;
            $last_dp_monthly = ($request->last_dp_daily) / 30;
            $proyeksi_net_sales_yearly = ($request->net_sales_tahun) + (($request->net_sales_tahun) * ($request->asumsi_kenaikan_penjualan) / 100);
            $proyeksi_net_sales_monthly = $proyeksi_net_sales_yearly/12;
            $proyeksi_hpp_yearly = $proyeksi_net_sales_yearly * ($request->asumsi_hpp) / 100;
            $proyeksi_hpp_monthly = $proyeksi_net_sales_monthly * ($request->asumsi_hpp) / 100;
            $next_dr_monthly = ($request->next_dr_daily) / 30;
            $next_di_monthly = ($request->next_di_daily) / 30;
            $next_dp_monthly = ($request->next_dp_daily) / 30;
            $next_proyeksi_net_sales_monthly = $proyeksi_net_sales_monthly;
            $next_proyeksi_hpp_monthly = $proyeksi_hpp_monthly;
            $last_nwc = $request->nwc;
            $financial_needs = ($next_dr_monthly + $next_di_monthly - $next_dp_monthly) * $next_proyeksi_hpp_monthly;
            $tambahan_modal = $financial_needs - $last_nwc;
            $pemenuhan_modal_nasabah = $tambahan_modal - ($request->pemenuhan_modal_bank);
            $outstanding_pembiayaan = $request->pemenuhan_modal_bank;
            $proyeksi_pendapatan = $proyeksi_net_sales_monthly;
            $nisbah_bank = ($outstanding_pembiayaan * $request->rate) / $proyeksi_pendapatan;
            $nisbah_nasabah = 100 - $nisbah_bank;
            $result = array('last_persentase_hpp'=>floatval($last_persentase_hpp*100), 'last_dr_monthly'=>round($last_dr_monthly, 2), 'last_di_monthly'=>round($last_di_monthly, 2),
                'last_dp_monthly'=>round($last_dp_monthly, 2), 'proyeksi_net_sales_yearly'=>$proyeksi_net_sales_yearly, 'proyeksi_net_sales_monthly'=>$proyeksi_net_sales_monthly,
                'proyeksi_hpp_yearly'=>$proyeksi_hpp_yearly,'proyeksi_hpp_monthly'=>$proyeksi_hpp_monthly, 'next_dr_monthly'=>round($next_dr_monthly, 2), 'next_di_monthly'=>round($next_di_monthly, 2),
                'next_dp_monthly'=>round($next_dp_monthly, 2), 'next_proyeksi_net_sales_monthly'=>$next_proyeksi_net_sales_monthly, 'next_proyeksi_hpp_monthly'=>$next_proyeksi_hpp_monthly,
                'last_nwc'=>$last_nwc, 'financial_needs'=>intval($financial_needs),'tambahan_modal'=>intval($tambahan_modal), 'pemenuhan_modal_nasabah'=>intval($pemenuhan_modal_nasabah),'outstanding_pembiayaan'=>$outstanding_pembiayaan,
                'proyeksi_pendapatan'=>$proyeksi_pendapatan,'nisbah_bank'=>$nisbah_bank,'nisbah_nasabah'=>$nisbah_nasabah);
        }  else if ($detail == "murabahah" ) {
            $request->harga_beli = $this->removeSpecialChar($request->harga_beli);
            $request->estimasi_pembiayaan_bank = $this->removeSpecialChar($request->estimasi_pembiayaan_bank);
            $request->estimasi_pembiayaan_tahunan = $this->removeSpecialChar($request->estimasi_pembiayaan_tahunan);
            $request->biaya_bank = $this->removeSpecialChar($request->biaya_bank);
            $request->biaya_notaris= $this->removeSpecialChar($request->biaya_notaris);

            $uang_muka = ($request->harga_beli) * ($request->presentase_dp) / 100;
            $pembiayaan_bank = ($request->harga_beli) - $uang_muka;
            $cost_recovery = ($pembiayaan_bank/$request->estimasi_pembiayaan_bank) * $request->estimasi_pembiayaan_tahunan;
            $margin_keuntungan = $pembiayaan_bank * $request->margin_keuntungan_bank / 100;
            $harga_jual = $pembiayaan_bank + ($request->jangka_waktu * $cost_recovery) + $margin_keuntungan;
            $angsuran = $harga_jual / ($request->jangka_waktu * 12);
            $margin = (($request->jangka_waktu * $cost_recovery) + $margin_keuntungan) / $request->harga_beli * 100;
            $lama_pinjam = $request->lama_pembiayaan * 12;
            $jumlah_pinjaman = $request->harga_beli - $uang_muka;
            $angsuran_perbulan = ((pow((1 + ($margin/12/100)),($request->lama_pembiayaan * 12))*($jumlah_pinjaman*$margin/100))) / (((pow((1 + ($margin/12/100)),($request->lama_pembiayaan*12)) - 1 ) * 12));
            $pembayaran_pertama = $angsuran_perbulan + $uang_muka + $request->biaya_bank + $request->biaya_notaris;
            $result = array('uang_muka'=>$uang_muka,'pembiayaan_bank'=>$pembiayaan_bank,'cost_recovery'=>intval($cost_recovery), 'margin_keuntungan'=>$margin_keuntungan,
                'harga_jual'=>intval($harga_jual),'angsuran'=>round($angsuran),'margin'=>($margin),'lama_pinjam'=>$lama_pinjam,'jumlah_pinjaman'=>$jumlah_pinjaman,
                'angsuran_perbulan'=>$angsuran_perbulan,'pembayaran_pertama'=>round($pembayaran_pertama));
        } else if ($detail == "salam" ) {
            $request->jumlah_pesanan = $this->removeSpecialChar($request->jumlah_pesanan);
            $request->harga_beli = $this->removeSpecialChar($request->harga_beli);
            $request->harga_jual = $this->removeSpecialChar($request->harga_jual);

            $jumlah_pembiayaan = ($request->jumlah_pesanan) * ($request->harga_beli);
            $total_harga_jual = ($request->jumlah_pesanan) * ($request->harga_jual);
            $laba_bank = $total_harga_jual - $jumlah_pembiayaan;
            $result = array('jumlah_pembiayaan'=>$jumlah_pembiayaan, 'total_harga_jual'=>$total_harga_jual,
                'laba_bank'=>$laba_bank);
        } else if ($detail == "istisna" ) {
            $request->jumlah_pesanan = $this->removeSpecialChar($request->jumlah_pesanan);
            $request->harga_satuan = $this->removeSpecialChar($request->harga_satuan);
            $request->biaya_bank = $this->removeSpecialChar($request->biaya_bank);

            $kebutuhan = ($request->jumlah_pesanan) * ($request->harga_satuan);
            $total_pembiayaan = $kebutuhan + $request->biaya_bank;
            $keuntungan_bank_akhir = $kebutuhan * $request->margin_keuntungan_istisna / 100;
            $pembayaran_akhir = $kebutuhan + $keuntungan_bank_akhir + $request->biaya_bank;
            $keuntungan_bank_perbulan = $kebutuhan * $request->margin_keuntungan_istisna / 100;
            $angsuran_perbulan = ((pow((1 + ($request->margin_keuntungan_istisna/12/100)),($request->jangka_waktu))*($kebutuhan*$request->margin_keuntungan_istisna/100))) / (((pow((1 + ($request->margin_keuntungan_istisna/12/100)),($request->jangka_waktu)) - 1 ) * 12));
            $pembayaran_pertama = $angsuran_perbulan + $request->biaya_bank;
            $result = array('kebutuhan'=>$kebutuhan, 'total_pembiayaan'=>$total_pembiayaan, 'keuntungan_bank_akhir'=>$keuntungan_bank_akhir,
                'pembayaran_akhir'=>$pembayaran_akhir, 'keuntungan_bank_perbulan'=>$keuntungan_bank_perbulan, 'angsuran_perbulan'=>$angsuran_perbulan,
                'pembayaran_pertama'=>round($pembayaran_pertama));
        }
        $json = json_encode(array_merge($request->except('_token'), $result));
        $code = $this->checkUniqueCode();
        $perhitunganAkad = PerhitunganAkad::create(['collection'=>$json, 'property' => $detail, 'user_id'=>Auth::id(), 'code'=>$code]);

        return redirect()->route('admin.perhitungan-akads.showIndex',$detail);
    }

    public function destroy(PerhitunganAkad $perhitunganAkad)
    {
        abort_if(Gate::denies('perhitungan_akad_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $perhitunganAkad->delete();

        return back();
    }

    public function massDestroy(MassDestroyPerhitunganAkadRequest $request)
    {
        PerhitunganAkad::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
