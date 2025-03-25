<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegisterForm(){
        return view('auth.register');
    }

    // Proses login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Redirect berdasarkan peran (role)
            $role = Auth::user()->role;
            return match ($role) {
                'customer' => redirect()->route('beranda'),
                'operator_cabang' => redirect()->route('operator.dashboard'),
                'pelaksanaan_cabang' => redirect()->route('bag_pelaksanaan_cabang.dashboard'),
                'direktur' => redirect()->route('direktur.dashboard'),
                default => redirect('/'),
            };
        }

        return back()->withErrors(['email' => 'Email atau password salah!']);
    }

    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'username' => 'required|string|min:3|max:20|unique:users,username',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => 'customer',
        ]);

        Auth::login($user);

        return redirect()->route('operator_cabang.dashboard')->with('success', 'Registration successful!');
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
