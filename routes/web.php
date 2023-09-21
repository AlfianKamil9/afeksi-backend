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
Route::get('/detail-pendaftaran-peer', function () {
    return view('pages.detail-pendaftaran-peer');
});
Route::get('/internship-uiux', function () {
    return view('pages.internship-uiux');
});
Route::get('/internshi-human-resource', function () {
    return view('pages.internship-uiux');
});
Route::get('/internship-backend', function () {
    return view('pages.internship-backend');
});
Route::get('/internship-busines-development', function () {
    return view('pages.internship-busines-development');
});
Route::get('/internship-content-writter', function () {
    return view('pages.internship-content-writter');
});
Route::get('/internship-frontend', function () {
    return view('pages.internship-frontend');
});
Route::get('/internship-graphic-design', function () {
    return view('pages.internship-graphic-design');
});
Route::get('/internship-marketing', function () {
    return view('pages.internship-marketing');
});
Route::get('/internship-product-development', function () {
    return view('pages.internship-product-development');
});
Route::get('/internship-program-innovator', function () {
    return view('pages.internship-program-innovator');
});
Route::get('/internship-public-relation', function () {
    return view('pages.internship-public-relation');
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
Route::get('/pembayaran', function () {
    return view('pages.pembayaran');
});
Route::get('/page-konseling', function () {
    return view('pages.page-konseling');
});
Route::get('/data-diri', function () {
    return view('pages.data-diri');
});
Route::get('/dashboard-profile', function () {
    return view('pages.dashboard-profile');
});

Route::get('/dashboard', function () {
    return view('pages.dashboard');
});

Route::get('/e-book', function () {
    return view('pages.e-book');
});

Route::get('/volunteer', function () {
    return view('pages.volunteer');
});

Route::get('/konselor', function () {
    return view('pages.konselor');
});

Route::get('/psikologi', function () {
    return view('pages.psikologi');
});

Route::get('/pre-marriage', function () {
    return view('pages.pre-marriage');
});

Route::get('/parenting-mentoring', function () {
    return view('pages.parenting-mentoring');
});

Route::get('/relationship-konseling', function () {
    return view('pages.relationship-konseling');
});