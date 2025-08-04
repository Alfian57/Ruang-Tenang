<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MemberAiChatController;
use App\Http\Controllers\MemberDashboard;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('/', [AuthController::class, 'authenticate'])->name('login.authenticate');
Route::get('/register', [AuthController::class, 'index'])->name('register');
Route::post('/register', [AuthController::class, 'create'])->name('register.create');

Route:: as('member.')->prefix('member')->group(function () {
    Route::get('/', [MemberDashboard::class, 'index'])->name('dashboard');
    Route::get('/ai-chat', [MemberAiChatController::class, 'index'])->name('ai-chat');
});