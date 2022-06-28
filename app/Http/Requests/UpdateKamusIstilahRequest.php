<?php

namespace App\Http\Requests;

use App\Models\KamusIstilah;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateKamusIstilahRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('kamus_istilah_edit');
    }

    public function rules()
    {
        return [
            'istilah' => [
                'string',
                'required',
            ],
            'detail' => [
                'required',
            ],
        ];
    }
}
