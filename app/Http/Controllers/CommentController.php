<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Konser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'fillin' => "min:3|max:200"
        ]);

        $konser = Konser::findOrFail($id);

        $comment = new Comment;
        $comment->user_id = Auth::user()->id;
        $comment->konser_id = $konser->id;
        $comment->fillin = $request->input('fillin');
        $comment->save();

        return back()->with('message', [
            'title' => "Berhasil!",
            'text' => "Berhasil memposting komentar pada konser: $konser->nama_konser"
        ]);
    }

    public function destroy($id)
    {
        $comment = Comment::where('id', $id)->firstOrFail();
        if ($comment->user_id != Auth::user()->id) {
            return back()->with('message', [
                'icon' => "error",
                'title' => "Gagal!",
                'text' => "Jangan mencoba menghapus komentar orang lain!"
            ]);
        }
        $comment->delete();
        return back()->with('message', [
            'title' => "Berhasil!",
            'text' => "Berhasil menghapus komentar anda"
        ]);
    }
}