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

Route::get('/landing-page-new', function () {
    return view('pages.landing-page-new');
});

Route::get('/lupa-password', function () {
    return view('pages.lupa-password');
});

Route::get('/lupa-password-notif', function () {
    return view('pages.lupa-password-notif');
});

Route::get('/reset-password', function () {
    return view('pages.reset-password');
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

Route::get('/faq-konseling', function () {
    return view('pages.faq-konseling');
});

Route::get('/karir', function () {
    return view('pages.karir');
});

Route::get('/pendaftaran-konselor', function () {
    return view('pages.pendaftaran-konselor');
});

Route::get('/internship-uiux', function () {
    return view('pages.internship-uiux');
});
Route::get('/page-mentoring', function () {
    return view('pages.page-mentoring');
});
Route::get('/artikel', function () {
    return view('pages.artikel');
});
Route::get('/artikel-detail', function () {
    return view('pages.artikel-detail');
});
Route::get('/junior-psikolog', function () {
    return view('pages.junior-psikolog');
});
Route::get('/popup-informasi', function () {
    return view('pages.popup-informasi');
});
