<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.pages.login', [
            'title' => 'Login',
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        if (auth()->attempt($credentials)) {
            if (auth()->user()->isAdmin()) {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('member.dashboard');
            }
        }

        toast('Login gagal, silakan coba lagi.', 'error');
        return back()->withInput($request->only('email'));
    }

    public function register()
    {
        return view('auth.pages.register', [
            'title' => 'Register',
        ]);
    }

    public function create(Request $request)
    {
        // 
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        toast('Anda telah berhasil logout.', 'success');
        return redirect()->route('login');
    }

}
