<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditDaftarMakananMinumanRequest extends FormRequest
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
            'nama' => 'required|string',
            'harga' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'nama.required' => 'Nama tidak boleh kosong',
            'nama.string' => 'Nama tidak boleh karakter aneh',
            'harga.required' => 'Harga tidak boleh kosong',
        ];
    }
}
