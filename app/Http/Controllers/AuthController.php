<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        $remember = $request->filled('remember');

        if (auth()->attempt($credentials, $remember)) {
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
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create($validatedData);

        toast('Registrasi berhasil, silahkan masuk!', 'success');
        return redirect()->route('login');
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
