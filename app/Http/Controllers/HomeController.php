<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Konser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $konser = Konser::with('tiket')->whereHas('tiket', function ($query) {
            $query->where('jumlah_tiket', '>', 0);
        })->orderBy('created_at', 'desc')->take(4)->get();
        $hotConcerts = Konser::whereHas('tiket', function ($query) {
            $query->where('jumlah_tiket', '>', 0);
        })
            ->withCount([
                'uniqueOrderCount as orders_count' => function ($query) {
                    $query->selectRaw('count(distinct user_id)');
                }
            ])
            ->orderByDesc('orders_count')
            ->take(4)
            ->get();

        $komen = Comment::with('konser')->latest()->limit(4)->get();

        return view('user_page.home', compact('konser', 'hotConcerts', 'komen'));
    }
}