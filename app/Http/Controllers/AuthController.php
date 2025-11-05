<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\Kasir;

class AuthController extends Controller
{
    /**
     * Menampilkan halaman login
     */
    public function showLogin()
    {
        if (Session::has('kasir_id')) {
            return redirect('/home');
        }
        return view('login');
    }

    /**
     * Menampilkan halaman register
     */
    public function showRegister()
    {
        return view('register');
    }

    /**
     * Proses pembuatan akun kasir baru
     */
    public function register(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'username' => 'required|string|unique:kasirs,username',
            'password' => 'required|min:4',
        ]);

        Kasir::create([
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/login')->with('success', 'Akun berhasil dibuat! Silakan login.');
    }

    /**
     * Proses login kasir
     */
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        
        $kasir = Kasir::where('username', $request->username)->first();

        if ($kasir && Hash::check($request->password, $kasir->password)) {
            // ✅ Simpan ID dan nama kasir di session
            Session::put('kasir_id', $kasir->id);
            Session::put('kasir_nama', $kasir->nama);

            return redirect('/home');
        }

        return back()->with('error', 'Username atau password salah!');
    }

    /**
     * Logout
     */
    public function logout()
    {
        Session::forget(['kasir_id', 'kasir_nama']);
        return redirect('/login')->with('success', 'Anda telah logout.');
    }

    /**
     * Halaman utama
     */
    public function home()
    {
        if (!Session::has('kasir_id')) {
            return redirect('/login');
        }

        return view('welcome');
    }
}
