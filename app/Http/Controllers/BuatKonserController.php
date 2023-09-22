<?php

namespace App\Http\Controllers;

use App\Models\BuatKonser;
use App\Http\Requests\StoreBuatKonserRequest;
use App\Http\Requests\UpdateBuatKonserRequest;
use App\Models\Kategori;

class BuatKonserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategoris = Kategori::all();
        return view('user_page.buat_konser', compact('kategoris'));
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
    public function store(StoreBuatKonserRequest $request)
    {
        dump($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(BuatKonser $buatKonser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BuatKonser $buatKonser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBuatKonserRequest $request, BuatKonser $buatKonser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BuatKonser $buatKonser)
    {
        //
    }
}