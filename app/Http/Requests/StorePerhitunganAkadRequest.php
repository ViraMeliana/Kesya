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
                'required',
            ],
            'code' => [
                'string',
                'nullable',
            ],
        ];
    }
}
