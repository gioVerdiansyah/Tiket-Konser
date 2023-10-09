<?php

namespace App\Http\Controllers;

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
            $komen = [];
            foreach ($hotConcerts as $row) {
                $komen = array_merge_recursive($komen, $row->comment->toArray());
            }
            
        return view('user_page.home', compact('konser', 'hotConcerts', 'komen'));
    }
}