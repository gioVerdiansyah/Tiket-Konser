<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Konser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function store(Request $request, $id)
    {
        $rules = [
            'fillin' => 'required|min:3|max:200',
        ];
        $messages = [
            'fillin.required' => 'Kolom komentar harus diisi.',
            'fillin.min' => 'Komentar minimal harus memiliki 3 karakter.',
            'fillin.max' => 'Komentar tidak boleh lebih dari 200 karakter.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            return response()->json(['error' => $errors]);
        }

        $konser = Konser::findOrFail($id);

        $comment = new Comment;
        $comment->user_id = Auth::user()->id;
        $comment->konser_id = $konser->id;
        $comment->fillin = $request->input('fillin');
        $comment->save();

        return response()->json(['message' => 'Komentar berhasil di post']);
    }

    public function destroy($id)
    {
        $comment = Comment::where('id', $id)->firstOrFail();
        if ($comment->user_id != Auth::user()->id) {
            return response()->json(['error' => 'Jangan mencoba menghapus komentar orang lain!']);
        }
        $comment->delete();
        return response()->json(['message' => 'Komentar berhasil di hapus']);
    }
}