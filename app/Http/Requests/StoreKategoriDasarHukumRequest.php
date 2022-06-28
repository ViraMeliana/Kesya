<?php

namespace App\Http\Requests;

use App\Models\KategoriDasarHukum;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreKategoriDasarHukumRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('kategori_dasar_hukum_create');
    }

    public function rules()
    {
        return [
            'nama' => [
                'string',
                'required',
            ],
        ];
    }
}
