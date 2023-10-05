<?php

namespace App\Http\Controllers;

use App\Models\Konser;
use App\Models\Notifications;
use Illuminate\Http\Request;

class AdminKonserController extends Controller
{
    public function index()
    {
        $konsers = Konser::paginate(10);
        return view('admin_page.konser_page', compact('konsers'));
    }
    public function detail($id)
    {
        $konser = Konser::with('tiket', 'comment')
            ->where('id', $id)
            ->latest()
            ->firstOrFail();

        $tiket = $konser->tiket[0];
        $jumlahKomentar = $konser->comment->count();

        return view('admin_page.detail-tiket', compact('konser', 'tiket', 'jumlahKomentar'));
    }
    public function destroy(Request $request)
    {
        $konser = Konser::where('id', $request->konser_id)->firstOrFail();
        $konserName = $konser->nama_konser;

        $notif = new Notifications;
        $notif->nama_konser = $konserName;
        $notif->user_id = $konser->user_id;
        $notif->fillin = $request->alasan_hapus;
        $notif->save();

        // $konser->delete();
        return back()->with('message', [
            'title' => "Berhasil!",
            'text' => "Berhasil menghapus konser $konserName dengan alasan {$request->alasan_hapus}"
        ]);
    }
}