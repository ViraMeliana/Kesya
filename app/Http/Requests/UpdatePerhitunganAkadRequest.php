<?php

namespace App\Http\Requests;

use App\Models\PerhitunganAkad;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePerhitunganAkadRequest extends FormRequest
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
                'required',
            ],
            'code' => [
                'string',
                'nullable',
            ],
        ];
    }
}
