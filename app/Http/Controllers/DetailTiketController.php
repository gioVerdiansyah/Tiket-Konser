<?php

namespace App\Http\Controllers;

use App\Models\Detail_tiket;
use App\Http\Requests\StoreDetail_tiketRequest;
use App\Http\Requests\UpdateDetail_tiketRequest;

class DetailTiketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $detail_tikets = Detail_tiket::class;
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
    public function store(StoreDetail_tiketRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Detail_tiket $detail_tiket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Detail_tiket $detail_tiket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDetail_tiketRequest $request, Detail_tiket $detail_tiket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Detail_tiket $detail_tiket)
    {
        //
    }
}
