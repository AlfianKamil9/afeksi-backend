<?php

use App\Http\Controllers\API\NotificationPaymentEventController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Karir\PeerKonselor;
use App\Http\Controllers\Event\WebinarController;
use App\Http\Controllers\Event\CampaignController;
use App\Http\Controllers\Karir\Internship;
use App\Http\Controllers\Karir\karirController;
use App\Http\Controllers\Karir\RelationshipKonselor;

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

// PAGES NO RULES
Route::get('/', function () {
    return view('pages.landing-page-new');
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

// KEGIATAN
Route::get('/kegiatan-webinar', [WebinarController::class, 'index'])->name('webinar');
Route::get('/kegiatan-webinar/{slug}', [WebinarController::class, 'show'])->name('webinar.detail');
Route::get('/kegiatan-campaign', [CampaignController::class, 'index'])->name('campaign');
Route::get('/kegiatan-campaign/{slug}', [CampaignController::class, 'show'])->name('campaign.detail');

// KARIER
Route::get('/karir',[karirController::class, 'index'])->name('karir');
Route::get('/pendaftaran-konselor', function () {
    return view('pages.pendaftaran-konselor');
})->name('pendaftaran.konselor');

// MENTORING
Route::get('/mentoring', function () {
    return view('pages.page-mentoring');
})->name('mentoring');




// MIDLLEWARE {{ HALAMAN PERLU LOGIN }}
// MIDLLEWARE
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/pendaftaran-relationship-konselor', [RelationshipKonselor::class, 'index'])->name('pendaftaran-relationship-konselor');
    Route::post('/pendaftaran-relationship-konselor/create', [RelationshipKonselor::class, 'store']);
    Route::get('/pendaftaran-peer-konselor',  [PeerKonselor::class, 'index'])->name('pendaftaran-peer-konselor');
    Route::post('/pendaftaran-peer-konselor', [PeerKonselor::class, 'store'])->name('store-peer-konselor');

    // PENDAFTARAN KARIR INTERNSHIP
    Route::get('/internship/{slug}', [Internship::class, 'show'])->name('internship.detail');
    Route::post('/Registerinternship', [Internship::class, 'store'])->name('internship.register');

});



Route::post('/midtrans/callback', [NotificationPaymentEventController::class, 'callback']);
Route::get('/midtrans/finish', [NotificationPaymentEventController::class, 'finishRedirect']);
Route::get('/midtrans/unfinish', [NotificationPaymentEventController::class, 'unfinishRedirect']);
Route::get('/midtrans/error', [NotificationPaymentEventController::class, 'errorRedirect']);




require __DIR__ . '/auth.php';



