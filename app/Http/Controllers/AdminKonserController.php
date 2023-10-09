<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Konser;
use App\Models\Notifications;
use Illuminate\Http\Request;

class AdminKonserController extends Controller
{
    public function index()
    {
        $konsers = Konser::withTrashed()->paginate(10);
        return view('admin_page.konser_page', compact('konsers'));
    }
    public function detail($id)
    {
        $konser = Konser::withTrashed()->with('tiket', 'comment')
            ->where('id', $id)
            ->latest()
            ->firstOrFail();

        $tiket = $konser->tiket[0];
        $jumlahKomentar = $konser->comment->count();

        return view('admin_page.detail-tiket', compact('konser', 'tiket', 'jumlahKomentar'));
    }
    public function destroy(Request $request, $id)
    {
        $konser = Konser::with('user')->where('id', $id)->firstOrFail();
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

    public function commentDestroy($id)
    {
        $komen = Comment::with([
            'konser' => function ($query) {
                $query->withTrashed();
            }
        ])->where('id', $id)->firstOrFail();

        $notif = new Notifications;
        $notif->nama_konser = "Komentar " . $komen->konser->nama_konser;
        $notif->user_id = $komen->user_id;
        $notif->fillin = "Notifikasi penghapusan komentar tidak pantas!";
        $notif->save();

        $komen->delete();
        return back()->with('message', [
            'title' => "Berhasil!",
            'text' => "Berhasil menghapus komentar user"
        ]);
    }
}