<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\UserModel;
use App\Models\LevelModel;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login_proses(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            return redirect()->route('user.index');
        }

        return redirect()->route('login')->with('failed', 'Username atau Password salah');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Kamu berhasil logout');
    }

    public function register()
    {
        $roles = LevelModel::all(); // Ambil semua level dari tabel m_level
        return view('auth.register', compact('roles')); // Kirim data roles ke view register
    }

    public function register_proses(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:m_user,username',
            'nama'     => 'required',
            'password' => 'required|min:6',
            'level_id' => 'required|exists:m_level,level_id', // tambahkan validasi level_id

        ]);

        UserModel::create([
            'username' => $request->username,
            'nama'     => $request->nama,
            'password' => Hash::make($request->password),
            'level_id' => $request->level_id, // ✅ simpan level_id ke tabel m_user

        ]);

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect()->route('user.index');
        }
    
        return redirect()->route('login')->with('failed', 'Register berhasil, tapi login gagal');
    }
}
