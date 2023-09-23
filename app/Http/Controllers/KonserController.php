<?php

namespace App\Http\Controllers;
<<<<<<< Updated upstream
=======

use App\Http\Requests\StoreKonserRequest;
>>>>>>> Stashed changes
use App\Models\Konser;
use App\Models\Kategori;
use App\Models\Tiket;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class KonserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategoris = Kategori::all();
        $konsers = Konser::paginate(12);
        return view('user_page.konser', compact('konsers', 'kategoris'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoris = Kategori::all();
        return view('user_page.buat_konser', compact('kategoris'));
    }



    /**
     * Store a newly created resource in storage.
     */

    public function store(StoreKonserRequest $request)
    {
        $konser = new Konser;
        $konser->user_id = Auth::user()->id;
        $konser->nama_konser = $request->nama_konser;
        $konser->nama_penyelenggara = $request->has('nama_penyelenggara') ? $request->nama_penyelenggara : Auth::user()->name;
        $konser->tanggal_konser = $request->tanggal_konser;
        $konser->alamat = $request->alamat;
        $konser->tempat = $request->tempat;
        $konser->lat = $request->lat;
        $konser->lon = $request->lon;

        $waktuMulai = DateTime::createFromFormat('H:i', $request->input('waktu_mulai'));
        $waktuSelesai = DateTime::createFromFormat('H:i', $request->input('waktu_selesai'));

        if ($waktuMulai >= $waktuSelesai) {
            return back()->with('message', [
                'icon' => 'error',
                'title' => "Gagal",
                'text' => "Gagal karena waktu mulai haruslah lebih kecil dari waktu selesai!"
            ]);
        }

        $konser->waktu_mulai = $waktuMulai;
        $konser->waktu_selesai = $waktuSelesai;

        // proes upload 3 image
        $bannerName = $request->file('banner')->hashName();
        $request->file('banner')->storeAs('public/image/konser/banner/' . $bannerName);
        $konser->banner = $bannerName;

        if ($request->file('photo_penyelenggara')) {
            $photo_penyelenggaraName = $request->file('photo_penyelenggara')->hashName();
            $request->file('photo_penyelenggara')->storeAs('public/image/konser/photo_penyelenggara/' . $photo_penyelenggaraName);
            $konser->photo_penyelenggara = $photo_penyelenggaraName;
        } else {
            $konser->photo_penyelenggara = Auth::user()->pp;
        }

        if ($request->file('denah_konser')) {
            $denah_konserName = $request->file('denah_konser')->hashName();
            $request->file('denah_konser')->storeAs('public/image/konser/denah_konser/' . $denah_konserName);
            $konser->denah = $denah_konserName;
        }

        $konser->deskripsi = $request->deskripsi;
        $konser->kategori_id = intval($request->kategori);
        $konser->save();

        $tiket = new Tiket;
        $tiket->jumlah_tiket = $request->jumlahtiket;
        $tiket->kategoritiket1 = $request->kategoritiket1;
        $tiket->harga1 = $request->harga1;
        $tiket->kategoritiket2 = $request->kategoritiket2;
        $tiket->harga2 = $request->harga2;
        $tiket->kategoritiket3 = $request->kategoritiket3;
        $tiket->harga3 = $request->harga3;
        $tiket->kategoritiket4 = $request->kategoritiket4;
        $tiket->harga4 = $request->harga4;
        $tiket->kategoritiket5 = $request->kategoritiket5;
        $tiket->harga5 = $request->harga5;

        $konser->tiket()->save($tiket);

        return back()->with('message', [
            'title' => "Berhasil",
            "text" => "Berhasil membuat konser!"
        ]);
    }

    public function search(Request $search)
    {
        $konsers = Konser::select('nama', 'alamat')
        ->where('nama', 'like', '%' . $search->search . '%')
        ->paginate(12);

        // Mengembalikan tampilan dengan hasil pencarian ke view
        return view('user_page.konser', compact('konsers'));

    }

    public function detail_tiket($id)
    {
        $konsers = Konser::where('id', $id)->first();
        $kategoris = new Collection([Konser::with('kategori')->where('tiket_id', $id)->get()[0]->kategori]);
        return view('user_page.konser', compact('konsers', 'kategoris', 'detail_tikets'));
    }

    public function kategori($id)
    {
        $konsers = Konser::where('kategori_id', $id)->paginate(12);
        $detail_tikets = new Collection([Konser::with('kategori')->where('kategori_id', $id)->get()[0]->detail_tiket]);
        $kategoris = new Collection([Konser::with('kategori')->where('kategori_id', $id)->get()[0]->kategori]);
        return view('user_page.konser', compact('konsers', 'kategoris' ));
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
