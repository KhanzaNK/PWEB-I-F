<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Perbaikan namespace Auth
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function index() {
        return view('formLogin'); 
    } 

    public function login(Request $request) {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        
        if (Auth::attempt([
            'email'    => $request->email,
            'password' => $request->password,
        ])) {
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah. Silahkan coba lagi.'
        ]);
    }

    public function logout(Request $request) {
    // Proses Logout
    Auth::logout();

    // Menghapus session
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    // Arahkan ke halaman login
    return redirect('/login')->with('status', 'Kamu telah berhasil logout.');
}
}