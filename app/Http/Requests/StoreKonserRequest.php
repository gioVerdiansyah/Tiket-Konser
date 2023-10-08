<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreKonserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'nama_konser' => 'required|string|min:3|max:255|unique:konsers,nama_konser',
            'nama_penyelenggara' => 'nullable|string|min:3|max:255',
            'tanggal_konser' => 'required|string|min:10|max:25',
            'alamat' => 'required|string|min:5|max:255',
            'lat' => 'required|numeric',
            'lon' => 'required|numeric',
            'tempat' => 'required|string|min:5|max:255',
            'waktu_mulai' => 'required|date_format:H:i',
            'waktu_selesai' => 'required|date_format:H:i',
            'kategori' => 'required|exists:kategoris,id',
            'kategoritiket1' => 'required|string|min:1',
            'kategoritiket2' => 'nullable|string|min:1',
            'kategoritiket3' => 'nullable|string|min:1',
            'kategoritiket4' => 'nullable|string|min:1',
            'kategoritiket5' => 'nullable|string|min:1',
            'harga1' => 'required|integer|min:3000',
            'harga2' => 'nullable|integer|min:3000',
            'harga3' => 'nullable|integer|min:3000',
            'harga4' => 'nullable|integer|min:3000',
            'harga5' => 'nullable|integer|min:3000',
            'jumlahtiket' => 'required|integer|min:10',
            'deskripsi' => 'nullable|string|min:5|max:300',
            'banner' => 'required|image|max:20480',
            'photo_penyelenggara' => 'nullable|image|max:20480',
            'denah_konser' => 'nullable|image|max:20480',
        ];
    }
}