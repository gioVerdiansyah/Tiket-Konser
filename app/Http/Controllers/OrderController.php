<?php

namespace App\Http\Controllers;

use App\Models\Konser;
use App\Models\Order;
use App\Models\TransactionHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\Midtrans\CreateSnapTokenService;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::with('konser')->where('user_id', Auth::user()->id)->where('payment_status', 1)->get();

        foreach ($orders as $order) {
            $snapToken = $order->snap_token;
            if (empty($snapToken)) {

                $midtrans = new CreateSnapTokenService($order);
                $snapToken = $midtrans->getSnapToken();

                $order->snap_token = $snapToken;
                $order->save();
            }
        }

        return view('user_page.orders', compact('orders'));
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
        $request->validate([
            'konser_id' => 'integer|exists:konsers,id',
            'price' => "integer",
            'kategori_tiket' => 'required|string',
            'jumlah' => 'required|integer|min:1|max:5'
        ]);

        $order = new Order;
        $order->user_id = Auth::user()->id;
        $konserId = $request->konser_id;
        $kategoriTiket = $request->kategori_tiket;
        $konser = Konser::with('tiket')->where('id', $konserId)->firstOrFail();
        $tiket = $konser->tiket[0];
        $order->konser_id = $request->konser_id;

        $kategoriValid = false;

        switch ($request->kategori_tiket) {
            case $tiket->kategoritiket1:
                if ($request->price == $tiket->harga1) {
                    $kategoriValid = true;
                }
                break;
            case $tiket->kategoritiket2:
                if ($request->price == $tiket->harga2) {
                    $kategoriValid = true;
                }
                break;
            case $tiket->kategoritiket3:
                if ($request->price == $tiket->harga3) {
                    $kategoriValid = true;
                }
                break;
            case $tiket->kategoritiket4:
                if ($request->price == $tiket->harga4) {
                    $kategoriValid = true;
                }
                break;
            case $tiket->kategoritiket5:
                if ($request->price == $tiket->harga5) {
                    $kategoriValid = true;
                }
                break;
            default:
                $kategoriValid = false;
                break;
        }

        if (!$kategoriValid) {
            return back()->with('message', [
                'icon' => "warning",
                'title' => "Hayolooo",
                'text' => "Antum pasti mengubah ubah value di inputannya!"
            ]);
        }

        // fungsi
        $admin = ($request->price * $request->jumlah) * (5 / 100);
        $total_price = $request->price * $request->jumlah + $admin;
        $konserId = $request->konser_id;
        $order->number = uniqid();
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

    // transaksi
    public function trans(Request $request)
    {
        $order = Order::where('number', $request->order_id)->firstOrFail();

        $transactionHistoryData = [
            'approval_code' => $request->approval_code,
            'bank' => $request->bank,
            'card_type' => $request->card_type,
            'fraud_status' => $request->fraud_status,
            'gross_amount' => $request->gross_amount,
            'masked_card' => $request->masked_card,
            'payment_type' => $request->payment_type,
            'status_message' => $request->status_message,
            'transaction_id' => $request->transaction_id,
            'transaction_status' => $request->transaction_status,
            'transaction_time' => $request->transaction_time,
            'order_id' => $order->id,
        ];

        TransactionHistory::create($transactionHistoryData);

        if ($request->status_code == 200 || $request->status_code == 201) {
            $order->payment_status = 2;
        } elseif ($request->status_code == 406) {
            $order->payment_status = 3;
        } else {
            $order->payment_status = 4;
        }

        $order->save();

        return response()->json(['message' => 'Transaksi berhasil diproses!']);
    }
}