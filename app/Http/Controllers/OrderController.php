<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Services\Midtrans\CreateSnapTokenService;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $order = Order::where('id', 7)->first();

        // $midtrans = new CreateSnapTokenService($order);
        // $snapToken = $midtrans->getSnapToken();

        // $order->snap_token = $snapToken;
        // $order->save();

        // return view('user_page.test', compact('order', 'snapToken'));
        return view('user_page.orders');
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
        // dump($request->all());
        $order = new Order;
        $order->user_id = Auth::user()->id;
        $order->konser_id = $request->konser_id;

        // fungsi
        $total_price = $request->price * $request->jumlah;
        $konserId = $request->konser_id;
        $kategoriTiket = $request->kategori_tiket;
        $timestamp = now()->format('YmdHis');
        $idPemesanan = $konserId . $kategoriTiket . $timestamp;
        $idPemesanan = substr($idPemesanan, 0, 16);

        $order->number = $idPemesanan;
        $order->harga_satuan = $request->price;
        $order->total_price = $total_price;
        $order->kategori_tiket = $request->kategori_tiket;
        $order->jumlah = $request->jumlah;
        $order->save();

        return back()->with('message', [
            'title' => "Berhasil!",
            'text' => "Berhasil memesan tiket konser"
        ]);
    }

    /**
     * Display the specified resource.
     */

    public function show(Order $order)
    {
        $snapToken = $order->snap_token;
        if (empty($snapToken)) {
            // Jika snap token masih NULL, buat token snap dan simpan ke database

            $midtrans = new CreateSnapTokenService($order);
            $snapToken = $midtrans->getSnapToken();

            $order->snap_token = $snapToken;
            $order->save();
        }

        return view('user_page.test', compact('order', 'snapToken'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}