<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemberDashboard extends Controller
{
    public function index()
    {
        return view('member.pages.dashboard', [
            'title' => 'Dashboard',
        ]);
    }
}
