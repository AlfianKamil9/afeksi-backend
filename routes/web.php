<?php

use App\Http\Controllers\PembayaranController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('pages.login');
});

Route::get('/register', function () {
    return view('pages.register');
});

Route::get('/home', function () {
    return view('pages.landing_page');
});

Route::get('/lupa-password', function () {
    return view('pages.lupa-password');
});

Route::get('/tentang-kami', function () {
    return view('pages.tentang-kami');
});

Route::get('/kebijakan-privasi', function () {
    return view('pages.kebijakan-privasi');
});

Route::get('/kegiatan-webinar', function () {
    return view('pages.kegiatan-webinar');
});

Route::get('/kegiatan-campaign', function () {
    return view('pages.kegiatan-campaign');
});

Route::get('/detail-webinar', function () {
    return view('pages.detail-webinar');
});

Route::get('/detail-campaign', function () {
    return view('pages.detail-campaign');
});