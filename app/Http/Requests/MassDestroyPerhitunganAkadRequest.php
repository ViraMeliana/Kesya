<?php

namespace App\Http\Requests;

use App\Models\PerhitunganAkad;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPerhitunganAkadRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('perhitungan_akad_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:perhitungan_akads,id',
        ];
    }
}
