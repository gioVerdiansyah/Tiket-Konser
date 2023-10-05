<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKonserRequest;
use App\Http\Requests\UpdateKonserRequest;
use App\Models\Konser;
use App\Models\Kategori;
use App\Models\Order;
use App\Models\Tiket;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class KonserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategoris = Kategori::all();
        $konsers = Konser::with('tiket')->withTrashed()->paginate(9);
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
        $konser->nama_penyelenggara = $request->filled('nama_penyelenggara') ? $request->nama_penyelenggara : Auth::user()->name;
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
            $konser->photo_penyelenggara = 'konser/photo_penyelenggara/' . $photo_penyelenggaraName;
        } else {
            $konser->photo_penyelenggara = 'photo-user/' . Auth::user()->pp;
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

        return to_route('konserku')->with('message', [
            'title' => "Berhasil",
            "text" => "Berhasil membuat konser!"
        ]);
    }

    public function konserku()
    {
        $konserku = Konser::with('tiket')->where('user_id', Auth::user()->id)->withTrashed()->paginate(8);
        return view('user_page.konserku', compact('konserku'));
    }

    public function searchKonserku(Request $search)
    {
        $konserku = Konser::with('tiket')
            ->where('user_id', Auth::user()->id)
            ->where(function ($query) use ($search) {
                $query->whereHas('tiket', function ($innerQuery) use ($search) {
                    $innerQuery->where('harga1', 'like', '%' . $search->search . '%');
                })
                    ->orWhere('nama_konser', 'like', '%' . $search->search . '%');
            })
            ->withTrashed()
            ->paginate(12);
        return view('user_page.konserku', compact('konserku'));
    }
    public function search(Request $request)
    {
        $konsers = Konser::with('tiket')->withTrashed()->where('nama_konser', 'like', '%' . $request->search . '%')
            ->orWhereHas('tiket', function ($query) use ($request) {
                $query->where(function ($subQuery) use ($request) {
                    $subQuery->whereRaw('CAST(harga1 AS SIGNED) >= ?', [intval($request->harga_min)]);
                })->where(function ($subQuery) use ($request) {
                    $subQuery->whereRaw('CAST(harga1 AS SIGNED) <= ?', [intval($request->harga_max)]);
                });
            });
        if (!empty($request->kategori)) {
            $konsers->whereIn('kategori_id', $request->kategori);
        }

        $konsers = $konsers->paginate(9);

        // Mengembalikan tampilan dengan hasil pencarian ke view
        $kategoris = Kategori::all();
        return view('user_page.konser', compact('konsers', 'kategoris'));
    }
    // verdi
    public function detailTiket($id)
    {
        // ini untuk detail tiket saat di konser terbaru di klik
        $konser = Konser::with('tiket', 'comment')
            ->where('id', $id)
            ->withTrashed()
            ->latest()
            ->firstOrFail();

        $tiket = $konser->tiket[0];

        if (Auth::check()) {
            $orderExists = Order::where('user_id', Auth::user()->id)
                ->where('konser_id', $id)
                ->where('payment_status', 2)
                ->exists();
        } else {
            $orderExists = false;
        }

        $jumlahKomentar = $konser->comment->count();

        return view('user_page.detail-tiket', compact('konser', 'tiket', 'orderExists', 'jumlahKomentar'));
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
    public function edit($buatkonser)
    {
        $konser = Konser::with('tiket')->where('id', $buatkonser)->firstOrFail();
        $kategoris = kategori::all();
        $tiket = $konser->tiket[0];
        return view('user_page.edit_konserku', compact('konser', 'kategoris', 'tiket'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKonserRequest $request, $id)
    {
        $konser = Konser::findOrFail($id);

        $request->validate([
            'nama_konser' => [
                'required',
                'string',
                'min:3',
                'max:255',
                Rule::unique('konsers')->ignore($id),
            ]
        ]);

        // Check if the authenticated user owns the concert
        if ($konser->user_id !== Auth::user()->id) {
            return back()->with('message', [
                'icon' => 'warning',
                'title' => "Peringatan",
                'text' => "Jangan mengubah id tujuan form!!!"
            ]);
        }

        // Memperbarui data konser
        $konser->nama_konser = $request->nama_konser;
        $konser->nama_penyelenggara = $request->filled('nama_penyelenggara') ? $request->nama_penyelenggara : Auth::user()->name;
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

        // Proses upload gambar banner baru
        if ($request->hasFile('banner')) {
            if ($konser->banner) {
                Storage::delete('public/image/konser/banner/' . $konser->banner);
            }
            $bannerName = $request->file('banner')->hashName();
            $request->file('banner')->storeAs('public/image/konser/banner/', $bannerName);
            $konser->banner = $bannerName;
        }

        // Proses upload gambar penyelenggara baru
        if ($request->hasFile('photo_penyelenggara')) {
            if ($konser->denah) {
                Storage::delete('public/image/konser/denah_konser/' . $konser->denah);
            }
            $photoPenyelenggara = $request->file('photo_penyelenggara')->hashName();
            $request->file('photo_penyelenggara')->storeAs('public/image/konser/photo_penyelenggara/', $photoPenyelenggara);
            $konser->photo_penyelenggara = $photoPenyelenggara;
        }

        // Proses upload gambar denah konser baru
        if ($request->hasFile('denah_konser')) {
            if ($konser->photo_penyelenggara) {
                Storage::delete('public/image/konser/photo_penyelenggara/' . $konser->photo_penyelenggara);
            }
            $denah_konserName = $request->file('denah_konser')->hashName();
            $request->file('denah_konser')->storeAs('public/image/konser/denah_konser/', $denah_konserName);
            $konser->denah = $denah_konserName;
        }

        $konser->deskripsi = $request->deskripsi;
        $konser->kategori_id = intval($request->kategori);

        $tiket = Tiket::where('konser_id', $konser->id)->first();
        $tiket->jumlah_tiket = $request->jumlahtiket;
        $tiket->kategoritiket1 = $request->kategoritiket1;
        $tiket->harga1 = $request->harga1;
        $tiket->kategoritiket2 = $request->filled('kategoritiket2') ? $request->kategoritiket2 : null;
        $tiket->harga2 = $request->filled('harga2') ? $request->harga2 : null;
        $tiket->kategoritiket3 = $request->filled('kategoritiket3') ? $request->kategoritiket3 : null;
        $tiket->harga3 = $request->filled('harga3') ? $request->harga3 : null;
        $tiket->kategoritiket4 = $request->filled('kategoritiket4') ? $request->kategoritiket4 : null;
        $tiket->harga4 = $request->filled('harga4') ? $request->harga4 : null;
        $tiket->kategoritiket5 = $request->filled('kategoritiket5') ? $request->kategoritiket5 : null;
        $tiket->harga5 = $request->filled('harga5') ? $request->harga5 : null;

        if ($konser->isDirty()) {
            $konser->save();
            $konser->tiket()->save($tiket);
            return back()->with('message', [
                'title' => "Berhasil",
                "text" => "Berhasil memperbarui konser!"
            ]);
        } else {
            return back()->with('message', [
                'icon' => 'info',
                'title' => "Tidak ada perubahan",
                "text" => "Anda tidak melakukan perubahan pada konser!"
            ]);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Konser $buatkonser)
    {
        $konserName = $buatkonser->nama_konser;
        if ($buatkonser->user_id !== Auth::user()->id) {
            return back()->with('message', [
                'icon' => 'warning',
                'title' => "Peringatan",
                'text' => "Jangan mengubah id tujuan form!!!"
            ]);
        }
        $buatkonser->delete();
        return back()->with('message', [
            'title' => "Berhasil",
            'text' => "Berhasil menghapus konser dengan nama: $konserName"
        ]);
    }
}