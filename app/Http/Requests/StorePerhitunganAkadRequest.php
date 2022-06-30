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
        return Gate::allows('perhitungan_akad_create');
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
                'integer',
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
                'integer',
            ],
            'estimasi_pembiayaan_tahunan' => [
            ],
            'biaya_bank' => [
                'integer',
            ],
            'biaya_notaris' => [
                'integer',
            ],
            'net_sales_tahun' => [
                'numeric',
            ],
            'hpp_pertahun' => [
                'numeric',
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
                'numeric',
            ],
            'asumsi_kenaikan_penjualan' => [
                'numeric',
            ],
            'asumsi_hpp' => [
                'numeric',
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
                'numeric',
            ],
            'pemenuhan_modal_bank' => [
                'numeric',
            ],
            'proyeksi_kenaikan_pendapatan' => [
                'numeric',
            ],
            'nama_nasabah' => [
                'string',
            ],
            'nama_bank' => [
                'string',
            ],
            'kebutuhan_modal' => [
                'numeric',
            ],
            'modal_nasabah' => [
                'numeric',
            ],
            'proyeksi_penerimaan_perbulan' => [
                'numeric',
            ],
            'rate' => [
                'numeric',
            ],
            'penghasilan' => [
                'numeric',
            ],
            'nama_barang' => [
                'string',
            ],
            'jenis_barang' => [
                'string',
            ],
            'jumlah_pesanan' => [
                'integer',
            ],
            'jangka_waktu' => [
                'integer',
            ],
            'harga_beli' => [
                'integer',
            ],
            'harga_jual' => [
                'integer',
            ],
        ];
    }
}
