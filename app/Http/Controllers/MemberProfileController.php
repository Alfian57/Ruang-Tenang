<?php

namespace App\Http\Controllers;

use Hash;
use Illuminate\Http\Request;

class MemberProfileController extends Controller
{
    public function index()
    {
        return view('member.pages.profile.index', [
            'title' => 'Profil',
        ]);
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,'.auth()->id(),
        ]);

        auth()->user()->update($data);

        toast('Profil berhasil diperbarui.', 'success');

        return redirect()->route('member.profile.index');
    }

    public function updatePassword(Request $request)
    {
        $data = $request->validate([
            'current_password' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if (! Hash::check($data['current_password'], auth()->user()->password)) {
            toast('Kata sandi saat ini salah.', 'error');

            return redirect()->back();
        }

        auth()->user()->update(['password' => $data['password']]);

        toast('Kata sandi berhasil diperbarui.', 'success');

        return redirect()->route('member.profile.index');
    }
}
