<?php

namespace App\Http\Requests;

use App\Models\KamusIstilah;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyKamusIstilahRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('kamus_istilah_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:kamus_istilahs,id',
        ];
    }
}
