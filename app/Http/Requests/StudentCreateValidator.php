<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentCreateValidator extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nis' => 'unique:students|max:4',
            'nama' => 'max:40'
        ];
    }

    public function attributes()
    {
        return [
            'nis' => 'NIS',
            'nama' => 'Nama'
        ];
    }

    public function messages()
    {
        return [
            'nis.unique' => 'NIS Sudah Terpakai',
            'nis.max' => 'NIS Maksimal :max Angka!',
            'nama.max' => 'Maksimal Nama :max Karakter'
        ];
    }
}
