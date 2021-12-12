<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// AUTH
Route::get('/', function () {
    return view('pages.auth.login');
});

Route::get('/login', function () {
    return view('pages.auth.login');
});

Route::get('/lupa-password', function () {
    return view('pages.auth.lupa_password');
});

Route::get('/password-baru', function () {
    return view('pages.auth.password_baru');
});

// DASHBOARD
Route::get('/dashboard', function () {
    return view('pages.sicepat.dashboard');
});

Route::get('/courier', function () {
    return view('pages.sicepat.courier');
});
