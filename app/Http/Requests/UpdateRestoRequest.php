<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRestoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nama_resto' => 'required|string',
            'nama_pemilik' => 'required|string',
            'alamat' => 'required',
            'no_hp' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nama_resto.required' => 'Nama Resto tidak boleh kosong',
            'nama_resto.string' => 'Nama Resto harus text',
            'nama_pemilik.required' => 'Nama Pemilik tidak boleh kosong',
            'nama_pemilik.string' => 'Nama Pemilik harus text',
            'alamat.required' => 'Alamat tidak boleh kosong',
            'no_hp.required' => 'No HP tidak boleh kosong',
        ];
    }
}
