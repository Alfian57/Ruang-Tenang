<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MemberAiChatController;
use App\Http\Controllers\MemberArticleController;
use App\Http\Controllers\MemberDashboardController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\GuestMiddleware;
use App\Http\Middleware\MemberMiddleware;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware(GuestMiddleware::class)->group(function () {
    Route::get('/', [AuthController::class, 'index'])->name('login');
    Route::post('/', [AuthController::class, 'authenticate'])->name('login.authenticate');
});

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'create'])->name('register.create');


Route::middleware('auth')->group(function () {
    Route::middleware(AdminMiddleware::class)->as('admin.')->prefix('admin')->group(function () {
        Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
    });

    Route::middleware(MemberMiddleware::class)->as('member.')->prefix('member')->group(function () {
        Route::get('/', [MemberDashboardController::class, 'index'])->name('dashboard');
        Route::get('/ai-chat', [MemberAiChatController::class, 'index'])->name('ai-chat');
        Route::get('/articles/{article}', [MemberArticleController::class, 'index'])->name('articles');
    });

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});