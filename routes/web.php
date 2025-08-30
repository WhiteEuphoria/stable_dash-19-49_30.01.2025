<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// === Theme/Static integration routes (disabled by default) ===
if (config('integration.theme_routes')) {
    Route::view('/', 'main.index')->name('home');
    Route::view('/login', 'auth.login')->name('login');
    Route::view('/register', 'auth.register')->name('register');
    Route::view('/verify', 'auth.verify')->name('verification.notice');
    Route::view('/user', 'user.dashboard')->name('user.dashboard');
    Route::view('/user/withdraw', 'user.withdraw')->name('user.withdraw');
    Route::view('/user/violation', 'user.violation')->name('user.violation');
    Route::view('/enter', 'enter')->name('enter');
    Route::prefix('admin')->group(function () {
        Route::view('/login', 'admin.login')->name('admin.login');
        Route::view('/dashboard', 'admin.dashboard')->name('admin.dashboard');
    });
}
// When disabled, Filament panels handle /admin and /client entirely.
