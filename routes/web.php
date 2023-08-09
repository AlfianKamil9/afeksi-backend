<?php

use App\Http\Controllers\API\NotificationPaymentEventController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Karir\PeerKonselor;
use App\Http\Controllers\Event\WebinarController;
use App\Http\Controllers\Event\CampaignController;
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
Route::get('/kegiatan-webinar', [WebinarController::class, 'index'])->name('webinar');
Route::get('/kegiatan-webinar/{slug}', [WebinarController::class, 'show'])->name('webinar.detail');
Route::get('/kegiatan-campaign', [CampaignController::class, 'index'])->name('campaign');
Route::get('/kegiatan-campaign/{slug}', [CampaignController::class, 'show'])->name('campaign.detail');



// Route::get('/beranda', function () {
    //     return view('pages.landing-page-new');
    // })->middleware(['auth', 'verified'])->name('beranda');

// MIDLLEWARE
Route::middleware(['auth', 'verified'])->group(function() {
    Route::get('/pendaftaran-relationship-konselor', [RelationshipKonselor::class, 'index'])->name('pendaftaran-relationship-konselor');
    Route::get('/pendaftaran-peer-konselor',  [PeerKonselor::class, 'index'])->name('pendaftaran-peer-konselor');
});

Route::post('/midtrans/callback', [NotificationPaymentEventController::class, 'callback']);
Route::get('/midtrans/finish', [NotificationPaymentEventController::class, 'finishRedirect']);
Route::get('/midtrans/unfinish', [NotificationPaymentEventController::class, 'unfinishRedirect']);
Route::get('/midtrans/error', [NotificationPaymentEventController::class, 'errorRedirect']);




require __DIR__ . '/auth.php';


// frontend yang belum fiks
// Route::get('/psikolog', function () {
//     return view('pages.psikolog');
// });
// Route::get('/profesional-konseling', function () {
//     return view('pages.profesional-konseling-online-senior');
// });


// GAK KEPAKE
// Route::get('/lupa-password', function () {
//     return view('pages.lupa-password');
// });
// Route::get('/lupa-password-notif', function () {
//     return view('pages.lupa-password-notif');
// });
// Route::get('/reset-password', function () {
//     return view('pages.reset-password');
// });
// Route::get('/landing-page-new', function () {
//     return view('pages.landing-page-new');
// });