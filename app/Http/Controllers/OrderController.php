<?php

namespace App\Http\Controllers;

use App\Models\Konser;
use App\Models\Notifications;
use App\Models\Order;
use App\Models\Tiket;
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
        $orders = Order::with([
            'konser' => function ($query) {
                $query->withTrashed();
            }
        ])->where('user_id', Auth::user()->id)->where('payment_status', 1)->get();

        foreach ($orders as $order) {
            if (!$order->konser->deleted_at) {
                $snapToken = $order->snap_token;
                if (empty($snapToken)) {

                    $midtrans = new CreateSnapTokenService($order);
                    $snapToken = $midtrans->getSnapToken();

                    $order->snap_token = $snapToken;
                    $order->save();
                }
            } else {
                $notif = new Notifications;
                $notif->nama_konser = $order->konser->nama_konser;
                $notif->user_id = $order->user_id;
                $notif->fillin = "Notifikasi hapus order karena konser telah kadaluarsa";
                $notif->save();

                Order::where('id', $order->id)->delete();
                $orders = Order::with([
                    'konser' => function ($query) {
                        $query->withTrashed();
                    }
                ])->where('user_id', Auth::user()->id)->where('payment_status', 1)->get();
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
        if (!Auth::user()->phone) {
            return to_route('profileUser')->with('message', [
                'icon' => 'error',
                'title' => "Gagal!",
                'text' => "Harap isi nomor telephone sebelum melakukan order!"
            ])->withErrors(['phone' => 'Harap isi nomor telephone sebelum melakukan order!']);
        }
        $request->validate([
            'konser_id' => 'integer|exists:konsers,id',
            'price' => "integer",
            'kategori_tiket' => 'required|string',
            'jumlah' => 'required|integer|min:1|max:5'
        ]);

        $konser = Konser::findOrFail($request->konser_id);
        $tiket = $konser->tiket[0];
        $jumlahTiketDibeli = Order::where('user_id', Auth::user()->id)
            ->where('konser_id', $konser->id)
            ->whereIn('payment_status', [1, 2])
            ->sum('jumlah');

        if (intval($jumlahTiketDibeli) >= 5) {
            return back()->with('message', [
                'icon' => "error",
                'title' => "Gagal!",
                'text' => "Anda sudah memesan tiket ini sebanyak 5 kali!"
            ]);
        }
        $batasTiket = 5 - $jumlahTiketDibeli;

        if ($request->jumlah > $batasTiket) {
            return back()->with('message', [
                'icon' => "error",
                'title' => "Gagal!",
                'text' => "Anda hanya bisa membeli tiket sebanyak $batasTiket tiket lagi pada konser ini"
            ]);
        }

        $tiketku = Tiket::where('id', $tiket->id)->firstOrFail();
        $tiketku->jumlah_tiket -= $request->jumlah;
        $tiketku->save();

        if (!$tiket->jumlah_tiket) {
            return back()->with('message', [
                'icon' => 'error',
                'title' => "Gagal",
                'text' => "Gagal karena stock sudah habis!"
            ]);
        }

        $order = new Order;
        $order->user_id = Auth::user()->id;
        $konserId = $request->konser_id;
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
    public function destroy($id)
    {
        $order = Order::where('id', $id)->firstOrFail();
        if ($order->user_id !== Auth::user()->id) {
            return back()->with('message', [
                'icon' => 'error',
                'title' => "Gagal!",
                'text' => "User id order tidaklah sama!"
            ]);
        }

        $konser = Konser::findOrFail($order->konser_id);
        $tiket = Tiket::findOrFail($konser->id);
        $tiket->jumlah_tiket += $order->jumlah;
        $tiket->save();

        $order->delete();
        return back()->with('message', [
            'title' => "Berhasil!",
            'text' => "Berhasil menghapus order!"
        ]);
    }

    // transaksi
    public function trans(Request $request)
    {
        $order = Order::where('number', $request->order_id)->firstOrFail();

        if ($request->status_code == 200 || $request->status_code == 201) {
            $order->payment_status = 2;
            $konser = Konser::where('id', $order->konser_id)->firstOrFail();
            $tiket = Tiket::where('konser_id', $konser->id)->firstOrFail();
            if ($tiket->jumlah_tiket == 0) {
                $order->payment_status = 4;
                $order->save();
                return response()->json(['message' => "Pembayaran gagal karena stock sudah habis!"], 422);
            }
        } elseif ($request->status_code == 407) {
            $order->payment_status = 3;
            $order->save();
            return response()->json(['message' => "Pembayaran telah kadaluarsa"], 407);
        } else {
            $order->payment_status = 4;
            $order->save();
            return response()->json(['message' => "Pembayaran gagal!"], 422);
        }

        $order->save();

        $transaksi = new TransactionHistory;
        $transaksi->fraud_status = $request->fraud_status;
        $transaksi->gross_amount = $request->gross_amount;
        $transaksi->payment_type = $request->payment_type;
        $transaksi->status_message = $request->status_message;
        $transaksi->transaction_id = $request->transaction_id;
        $transaksi->transaction_status = $request->transaction_status;
        $transaksi->transaction_time = $request->transaction_time;
        $transaksi->order_id = $order->id;

        if ($request->payment_type == 'bank_transfer') {
            if (isset($request->va_numbers[0])) {
                $transaksi->va_number = $request->va_numbers[0]['va_number'];
                $transaksi->bank = $request->va_numbers[0]['bank'];
            }
            if ($request->has('permata_va_number')) {
                $transaksi->bank = 'permata';
                $transaksi->va_number = $request->permata_va_number;
            }
        } elseif ($request->payment_type == 'echannel') {
            $transaksi->bank = 'mandiri';
            $transaksi->va_number = $request->bill_key;
            $transaksi->biller_code = $request->biller_code;
        } elseif ($request->payment_type == 'credit_card') {
            $transaksi->approval_code = $request->approval_code;
            $transaksi->masked_card = $request->masked_card;
            $transaksi->card_type = $request->card_type;
            $transaksi->bank = $request->bank;
        }

        $transaksi->save();

        return response()->json(['message' => 'Transaksi berhasil diproses!']);
    }
}