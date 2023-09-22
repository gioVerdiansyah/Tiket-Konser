<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\Regency;


class IndoregionController extends Controller
{
    public function getkota(Request $request)
    {
        $id_provinsi = $request->id_provinsi;
    
        $kotas = Regency::where('province_id', $id_provinsi)->pluck('name', 'id');

        // Menggunakan array untuk menghasilkan opsi dropdown dalam bentuk JSON
        $options = [];
        foreach ($kotas as $id => $name) {
            $options[] = [
                'id' => $id,
                'name' => $name,
            ];
        }
    
        return response()->json($options);
    }
}
