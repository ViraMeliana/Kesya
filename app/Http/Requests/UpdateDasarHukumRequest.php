<?php

namespace App\Http\Requests;

use App\Models\DasarHukum;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDasarHukumRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('dasar_hukum_edit');
    }

    public function rules()
    {
        return [
            'kategori_dasar_hukum_id' => [
                'required',
                'integer',
            ],
            'nama_hukum' => [
                'string',
                'required',
            ],
            'file_hukum' => [
                'required',
            ],
            'slug' => [
                'string',
            ],
        ];
    }
}
