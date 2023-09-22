<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\Regency;


class IndoregionController extends Controller
{
    public function jualtiket(){
        $provinces = Province::all();
        return view('user_page.jual_tiket', compact('provinces'));
    }

    public function getkota(Request $request){
        $id_provinsi = $request->id_provinsi;
    
        $kotas = Regency::where('province_id', $id_provinsi)->pluck('name', 'id');

        $option = "<option>Pilih Kota atau Kabupaten...</option>";
    
        return response()->json($kotas);
    }
    
}
