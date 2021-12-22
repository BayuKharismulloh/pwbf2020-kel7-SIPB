<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/');
        }else{
            return redirect()->route('login')->with('gagal', 'Email atau Password yang kamu masukkan salah!');
        }
    }

    public function showRegisterForm()
    {
        $kecamatans = Kecamatan::all();

        return view('auth.register', compact('kecamatans'));
    }

    public function register(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'tgl_lahir' => $request->tgl_lahir,
            'kecamatan_id' => $request->kecamatan_id,
            'role_id' => 3
        ]);

        return redirect()->route('login')->with('success', 'Akun telah dibuat,Silakan Login!!');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
