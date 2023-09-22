<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UpdateProfileController extends Controller
{
    public function index()
    {
        $data_user = User::where('id', Auth::user()->id)->first();
        return view('user_page.profile', compact('data_user'));
    }
    public function update(UpdateProfileRequest $request, User $user)
    {
        $user->name = $request->nama;
        // Password nanti
        $old_pass = $user->password;
        $user->password = $old_pass;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->alamat = $request->alamat;

        // upload photo profile
        if ($request->file('pp')) {
            $file_name = $request->file('pp')->hashName();
            $request->file('pp')->storeAs('public/image/photo-user/' . $file_name);
            $user->pp = $file_name;
        }

        if ($user->isDirty()) {
            $user->save();
            return back()->with('message', [
                'title' => "Berhasil",
                "text" => "Berhasil meupdate profile"
            ]);
        } else {
            return back()->with('message', [
                'icon' => 'info',
                'title' => "Tidak ada perubahan!",
                "text" => "Anda tidak melakukan perubahan apapun pada profile anda"
            ]);
        }
    }
}