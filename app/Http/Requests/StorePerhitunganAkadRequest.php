<?php

namespace App\Http\Requests;

use App\Models\PerhitunganAkad;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePerhitunganAkadRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('perhitungan_akad_access');
    }

    public function rules()
    {
        return [
            'collection' => [
                'string',
            ],
            'code' => [
                'string',
                'nullable',
            ],
            'bahan' => [
                'string',
            ],
            'ukuran' => [
                'string',
            ],
            'model' => [
                'string',
            ],
            'warna' => [
                'string',
            ],
            'harga_satuan' => [
                'string',
            ],
            'margin_keuntungan_istisna' => [
                'integer',
            ],
            'margin_keuntungan_perbulan' => [
                'integer',
            ],
            'presentase_dp' => [
                'integer',
            ],
            'lama_pembiayaan' => [
                'integer',
            ],
            'margin_keuntungan_bank' => [
                'integer',
            ],
            'estimasi_pembiayaan_bank' => [
                'string',
            ],
            'estimasi_pembiayaan_tahunan' => [
                'string',
            ],
            'biaya_bank' => [
                'string',
            ],
            'biaya_notaris' => [
                'string',
            ],
            'net_sales_tahun' => [
                'string',
            ],
            'hpp_pertahun' => [
                'string',
            ],
            'last_dr_daily' => [
                'integer',
            ],
            'last_di_daily' => [
                'integer',
            ],
            'last_dp_daily' => [
                'integer',
            ],
            'nwc' => [
                'string',
            ],
            'asumsi_kenaikan_penjualan' => [
                'string',
            ],
            'asumsi_hpp' => [
                'string',
            ],
            'next_dr_daily' => [
                'integer',
            ],
            'next_di_daily' => [
                'integer',
            ],
            'next_dp_daily' => [
                'integer',
            ],
            'proyeksi_kenaikan_modal' => [
                'string',
            ],
            'pemenuhan_modal_bank' => [
                'string',
            ],
            'proyeksi_kenaikan_pendapatan' => [
                'string',
            ],
            'nama_nasabah' => [
                'string',
            ],
            'nama_bank' => [
                'string',
            ],
            'kebutuhan_modal' => [
                'string',
            ],
            'modal_nasabah' => [
                'string',
            ],
            'proyeksi_penerimaan_perbulan' => [
                'string',
            ],
            'rate' => [
                'string',
            ],
            'penghasilan' => [
                'string',
            ],
            'nama_barang' => [
                'string',
            ],
            'jenis_barang' => [
                'string',
            ],
            'jumlah_pesanan' => [
                'string',
            ],
            'jangka_waktu' => [
                'integer',
            ],
            'harga_beli' => [
                'string',
            ],
            'harga_jual' => [
                'string',
            ],
        ];
    }
}
