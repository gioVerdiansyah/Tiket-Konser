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
        $konser = Konser::with('tiket')->orderBy('created_at', 'desc')->take(4)->get();
        $hotConcerts = Konser::with([
            'comment' => function ($query) {
                $query->take(4);
            }
        ])
            ->withCount([
                'uniqueOrderCount as orders_count' => function ($query) {
                    $query->selectRaw('count(distinct user_id)');
                }
            ])
            ->orderByDesc('orders_count')
            ->take(4)
            ->get();

            $komen = Comment::with('konser')->latest()->get();

        return view('user_page.home', compact('konser', 'hotConcerts', 'komen'));
    }
}