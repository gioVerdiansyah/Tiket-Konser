<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoretiketRequest extends FormRequest
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
    public function rules()
    {
        return [
            'nama-konser' => 'required|string|min:3|max:255',
            'nama-penyelenggara' => 'required|string|min:3|max:255',
            'tanggal-konser' => 'required|string|size:24',
            'tempat' => 'required|string|min:5|max:255',
            'alamat' => 'required|string|min:5|max:255',
            'kota' => 'required|string|max:255',
            'lat' => 'required|numeric',
            'lon' => 'required|numeric',
            'waktu-mulai' => 'required|date_format:H:i',
            'waktu-selesai' => 'required|date_format:H:i',
            'kategori1' => 'required|integer|min:1',
            'kategori2' => 'nullable|integer|min:1',
            'kategori3' => 'nullable|integer|min:1',
            'kategori4' => 'nullable|integer|min:1',
            'kategori5' => 'nullable|integer|min:1',
            'harga1' => 'required|integer|min:1',
            'harga2' => 'nullable|integer|min:1',
            'harga3' => 'nullable|integer|min:1',
            'harga4' => 'nullable|integer|min:1',
            'harga5' => 'nullable|integer|min:1',
            'jumlahtiket' => 'required|integer|min:1',
            'harga' => 'required|numeric|min:5000',
            'deskripsi' => 'required|string|min:5',
            'banner' => 'required|image|max:20480',
            'photo-penyelenggara' => 'required|image|max:20480',
        ];
    }

}