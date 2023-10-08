<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\TransactionHistory;
use Illuminate\Http\Request;

class ListOrderController extends Controller
{
    public function ListKonser(Request $request)
    {
        $orders = Order::with('transactionHistory')->where('payment_status', 2)->paginate(10);

        return view('admin_page.list-order', compact('orders'));
    }

    public function destroy($id)
    {
        $order = Order::find($id);

        if ($order) {
            $order->delete();

            session()->flash('message', [
                'icon' => "success",
                'title' => "Berhasil",
                'text' => "Berhasil menghapus order"
            ]);

            return back();
        }
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $query = Order::where('payment_status', 2)
            ->where(function ($query) use ($search) {
                $query->where('number', 'like', '%' . $search . '%')
                    ->orWhereHas('user', function ($userQuery) use ($search) {
                        $userQuery->where('email', 'like', '%' . $search . '%');
                    });
            });

        // Menggunakan paginate() untuk mengambil data dengan pembagian halaman
        $orders = $query->paginate(10);

        return view('admin_page.list-order', compact('orders'));
    }

}