<?php

namespace App\Http\Controllers;
use App\Models\Konser;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KonserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategoris = Kategori::all();
        $konsers = Konser::all();
        return view('user_page.konser', compact('konsers', 'kategoris'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }


    public function search(Request $search)
    {
        $konsers = Konser::where('nama', 'like', '%' . $search->search . '%')->get();

        // Mengembalikan tampilan dengan hasil pencarian ke view
        return view('user_page.konser', compact('konsers'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        //
    }
public function kategori($id)
{
    $kategori = Kategori::all();
    $konser = Konser::where('kategori_id', $id);
    return view('user_page.konser', compact('konsers', 'kategoris'));
}
    /**
     * Display the specified resource.
     */
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
