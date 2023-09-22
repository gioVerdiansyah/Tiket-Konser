<?php

namespace App\Http\Controllers;

use App\Models\Konser;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class KonserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategoris = Kategori::all();
        $konsers = Konser::paginate(12);
        return view('user_page.konser', compact('konsers', 'kategoris', 'kotas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }



    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        //
    }

    public function search(Request $search)
    {
        $konsers = Konser::where('nama', 'like', '%' . $search->search . '%')->paginate(12);

        // Mengembalikan tampilan dengan hasil pencarian ke view
        return view('user_page.konser', compact('konsers'));

    }

    public function detail_tiket($id)
    {
        $konsers = Konser::where('id', $id)->first();
        $detail_tikets = new Collection([Konser::with('tiket')->where('tiket_id', $id)->get()[0]->tiket]);
        $kategoris = new Collection([Konser::with('kategori')->where('tiket_id', $id)->get()[0]->kategori]);
        $kotas = new Collection([Konser::with('kota')->where('tiket_id', $id)->get()[0]->kota]);
        return view('user_page.konser', compact('konsers', 'kategoris', 'kotas', 'detail_tikets'));
    }

    public function kategori($id)
    {
        $konsers = Konser::where('kategori_id', $id)->paginate(12);
        $detail_tikets = new Collection([Konser::with('kategori')->where('kategori_id', $id)->get()[0]->detail_tiket]);
        $kategoris = new Collection([Konser::with('kategori')->where('kategori_id', $id)->get()[0]->kategori]);
        $kotas = new Collection([Konser::with('kota')->where('kategori_id', $id)->get()[0]->kota]);
        return view('user_page.konser', compact('konsers', 'kategoris', 'kotas'));
    }
    /**
     * Display the specified resource.
     */
    public function kota($id)
    {
        $konsers = Konser::where('kota_id', $id)->paginate(12);
        $kotas = new Collection([Konser::with('kota')->where('kota_id', $id)->get()[0]->kota]);
        $kategoris = new Collection([Konser::with('kategori')->where('kota_id', $id)->get()[0]->kategori]);
        // $kotas = Konser::with(['kota', 'kategori'])->where('kota_id', $id)->get();
        return view('user_page.konser', compact('konsers', 'kotas', 'kategoris'));
    }

    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}