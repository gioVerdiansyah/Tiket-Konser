<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UpdateProfileController extends Controller
{
    public function index()
    {
        $data_user = User::where('id', Auth::user()->id)->first();
        return view('user_page.profile', compact('data_user'));
    }
    public function update(UpdateProfileRequest $request, User $user)
    {
        if ($user->id !== Auth::user()->id) {
            return back()->with('message', [
                'icon' => 'warning',
                'title' => "Peringatan",
                'text' => "Jangan mengubah id tujuan form!!!"
            ]);
        }
        $user->name = $request->nama;
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
    public function chagePass(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'passwordLama' => 'required|min:6',
            'passwordBaru' => 'required|min:6',
            'konfirmasiPasswordBaru' => 'required|min:6|same:passwordBaru',
        ]);

        if ($user->id !== Auth::user()->id) {
            return back()->with('message', [
                'icon' => 'warning',
                'title' => "Peringatan",
                'text' => "Jangan mengubah id tujuan form!!!"
            ]);
        }

        $errorMessages = $validator->errors()->all();
        $errorCount = count($errorMessages);
        $errorMessagesWithNumbers = [];

        foreach ($errorMessages as $key => $message) {
            $errorMessagesWithNumbers[] = ($key + 1) . '. ' . $message;
        }

        if ($errorCount > 0) {
            return back()->with('message', [
                'icon' => 'error',
                'title' => 'Gagal',
                'text' => implode(' ', $errorMessagesWithNumbers),
            ])->withErrors($validator)->withInput();
        }

        if ($request->input('passwordBaru') !== $request->input('konfirmasiPasswordBaru')) {
            return back()->with('message', [
                'icon' => 'error',
                'title' => 'Gagal',
                'text' => 'Konfirmasi password tidak sama!'
            ]);
        }

        if (!Hash::check($request->input('passwordLama'), $user->password)) {
            return back()->with('message', [
                'icon' => 'error',
                'title' => 'Gagal',
                'text' => 'Password tidak sama dengan yang dulu!'
            ]);
        }
        $user->password = Hash::make($request->passwordBaru);
        $user->save();

        return back()->with('message', [
            'title' => 'Sukses',
            'text' => 'Password berhasil di ubah!'
        ]);
    }
}