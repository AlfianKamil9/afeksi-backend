<?php

use App\Http\Controllers\Event\CampaignController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GoogleController;
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
    return view('pages.landing_page');
})->name('homepage');
Route::get('/tentang-kami', function () {
    return view('pages.tentang-kami');
})->name("tentang-kami");
Route::get('/kebijakan-privasi', function () {
    return view('pages.kebijakan-privasi');
})->name("kebijakan-privasi");
Route::get('/FAQ', function () {
    return view('pages.faq-konseling');
})->name('FAQ');


Route::get('/beranda', function () {
    return view('pages.landing_page');
})->middleware(['auth', 'verified'])->name('beranda');

require __DIR__ . '/auth.php';

// PAGES NO RULES
Route::get('/kegiatan-webinar', function () {
    return view('pages.kegiatan-webinar');
})->name('webinar');
Route::get('/kegiatan-campaign', [CampaignController::class, 'index'])->name('campaign');
Route::get('/kegiatan-campaign/{slug}', [CampaignController::class, 'show'])->name('campaign.detail');
Route::get('/detail-webinar', function () {
    return view('pages.detail-webinar');
});



// frontend yang belum fiks
Route::get('/psikolog', function () {
    return view('pages.psikolog');
});
Route::get('/profesional-konseling', function () {
    return view('pages.profesional-konseling-online-senior');
});

