<?php

namespace App\Http\Requests;

use App\Models\KategoriDasarHukum;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyKategoriDasarHukumRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('kategori_dasar_hukum_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:kategori_dasar_hukums,id',
        ];
    }
}
