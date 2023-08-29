<?php


use Illuminate\Http\Request;
use App\Models\DetailPembayaran;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\KlaimCode;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Karir\Internship;
use App\Http\Controllers\Karir\PeerKonselor;
use App\Http\Controllers\Karir\karirController;
use App\Http\Controllers\Event\WebinarController;
use App\Http\Controllers\Event\CampaignController;
use App\Http\Controllers\Artikel\artikelController;
use App\Http\Controllers\Karir\RelationshipKonselor;
use App\Http\Controllers\API\NotificationPaymentEventController;
use App\Http\Controllers\Karir\BrandAmbasador;
use App\Http\Controllers\Karir\RelationshipHeroes;
use App\Http\Controllers\Transaksi\Layanan\KonselingTransaksiController;
use App\Http\Controllers\Transaksi\Layanan\MentoringTransaksiController;
use App\Http\Controllers\Transaksi\NotifikasiKonseling;
use App\Http\Controllers\Transaksi\NotifikasiMentoring;

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

// BERANDA
Route::get('/', function () {
    return view('pages.landing-page-new');
})->name('homepage');

// TENTANG KAMI
Route::get('/tentang-kami', function () {
    return view('pages.tentang-kami');
})->name("tentang-kami");

// KEBIJAKAN PRIVASI
Route::get('/kebijakan-privasi', function () {
    return view('pages.kebijakan-privasi');
})->name("kebijakan-privasi");

// FAQ
Route::get('/FAQ', function () {
    return view('pages.faq-konseling');
})->name('FAQ');

// KEGIATAN
Route::get('/kegiatan-webinar', [WebinarController::class, 'index'])->name('webinar');
Route::get('/kegiatan-webinar/{slug}', [WebinarController::class, 'show'])->name('webinar.detail');
Route::get('/kegiatan-campaign', [CampaignController::class, 'index'])->name('campaign');
Route::get('/kegiatan-campaign/{slug}', [CampaignController::class, 'show'])->name('campaign.detail');

// KARIER
Route::get('/karir', [karirController::class, 'index'])->name('karir');
Route::get('/join-konselor', function () {
    return view('pages.Karir.pendaftaran-konselor');
})->name('pendaftaran.konselor');
Route::get('/join-volunteer', function () {
    return view('pages.Karir.volunteer');
})->name('join.volunteer');

// MENTORING
Route::get('/mentoring', function () {
    return view('pages.page-mentoring');
})->name('mentoring');
// KONSELING
Route::get('/konseling', function () {
    return view('pages.page-konseling');
})->name('konseling');

// ARTIKEL
Route::get('/artikel', [artikelController::class, 'index'])->name('artikel');
Route::get('/artikel/detail/{slug}', [artikelController::class, 'show'])->name('artikel.detail');



// MIDLLEWARE HALAMAN YANG PERLU LOGIN
Route::middleware(['auth', 'verified'])->group(function () {
    // PENDAFTARAN RELATIONSHIP KONSELOR
    Route::get('/pendaftaran-relationship-konselor', [RelationshipKonselor::class, 'index'])->name('pendaftaran-relationship-konselor');
    Route::post('/pendaftaran-relationship-konselor/create', [RelationshipKonselor::class, 'store']);
    // PENDAFTARAN PEER KONSELOR
    Route::get('/pendaftaran-peer-konselor',  [PeerKonselor::class, 'index'])->name('pendaftaran-peer-konselor');
    Route::post('/pendaftaran-peer-konselor', [PeerKonselor::class, 'store'])->name('store-peer-konselor');
    // PENDAFTARAN INTERNSHIP
    Route::get('/internship/{slug}', [Internship::class, 'show'])->name('internship.detail');
    Route::post('/Registerinternship', [Internship::class, 'store'])->name('internship.register');
    // PENDAFTARAN BRAND AMBASSADOR (VOLUNTEER)
    Route::get('/pendaftaran-brand-ambassador', [BrandAmbasador::class, 'index'])->name('volunteer.brand-ambassador');
    Route::post('/pendaftaran-brand-ambassador/create', [BrandAmbasador::class, 'store'])->name('volunteer.register-brand-ambassador');
    // PENDAFTARAN RELATIONSHIP HEROES (VOLUNTEER)
    Route::get('/pendaftaran-relationship-heroes', [RelationshipHeroes::class, 'index'])->name('volunteer.relationship-heroes'); 
    Route::post('/pendaftaran-relationship-heroes', [RelationshipHeroes::class, 'store'])->name('volunteer.store-relationship-heroes'); 
    //PENDAFTARAN WEBINAR
    Route::post('/kegiatan-webinar/{slug}', [WebinarController::class, 'store'])->name('daftar-webinar');
    // PENDAFTARAN CAMPAIGN
    Route::post('/kegitan-campaign/{slug}', [CampaignController::class, 'store'])->name('daftar-campaign');


    // MENTORING LAYANAN
    // ISI FORM DATA DIRI KHUSUS MENTORING
    Route::get('/slug-mentoring-yg-dipilih/{ref_transaction_layanan}/data-diri', [MentoringTransaksiController::class, 'showFormDataDiri'])->name('form.datadiri.mentoring');
    Route::post('/slug-mentoring-yg-dipilih/{ref_transaction_layanan}/submit-form-mentoring', [MentoringTransaksiController::class, 'submitFormDataDiri'])->name('submit.form.datadiri.mentoring');
    // CHECKOUT KHUSUS MENTORING
    Route::get('/slug-mentoring-yg-dipilih/{ref_transaction_layanan}/pembayaran', [MentoringTransaksiController::class, 'layananNonProfesional'])->name('checkout.layanan.mentoring');
    Route::post('/slug-mentoring-yg-dipilih/{ref_transaction_layanan}/checkout', [MentoringTransaksiController::class, 'checkoutLayananNonProfessional']);
    // NOTIFICATION AFTER PEMBAYARAN MENTORING
    Route::get('/{ref_transaction_layanan}/notification-mentoring/success', [NotifikasiMentoring::class, 'index'])->name('notification.success');

    // KONSELING
    //PROFESSIONAL KONSELING
    Route::get('/slug-konseling-yg-dipilih/{ref_transaction_layanan}/data-diri', [KonselingTransaksiController::class, 'showFormDataDiri']);
    Route::post('/slug-konseling-yg-dipilih/{ref_transaction_layanan}/submit-form-konseling', [KonselingTransaksiController::class, 'submitDataDiri']);
    //CHECKOUT
    Route::get('/slug-konseling-yg-dipilih/{ref_transaction_layanan}/pembayaran', [KonselingTransaksiController::class, 'showPembayaran']);
    Route::post('/slug-konseling-yg-dipilih/{ref_transaction_layanan}/checkout', [KonselingTransaksiController::class, 'checkoutProfessionalKonseling']);
    Route::get('/{ref_transaction_layanan}/notification-konseling/success', [NotifikasiKonseling::class, 'index']);
});




// API CALLBACK
Route::post('/midtrans/callback', [NotificationPaymentEventController::class, 'callback']);
Route::get('/midtrans/finish', [NotificationPaymentEventController::class, 'finishRedirect']);
Route::get('/midtrans/unfinish', [NotificationPaymentEventController::class, 'unfinishRedirect']);
Route::get('/midtrans/error', [NotificationPaymentEventController::class, 'errorRedirect']);




require __DIR__ . '/auth.php';
Route::fallback(function () {
    return view('errors.404'); // Menampilkan halaman 404
});




// hanya untuk cek tampilan timeline
// Route::get('/horizontal-timeline', function () {
//     return view('partials.horizontal-timeline');
// });

// hanya untuk cek tampilan junior
Route::get('/junior-psikolog', function () {
    return view('pages.junior-psikolog');
});

Route::get('/popup-informasi', function () {
    return view('pages.popup-informasi');
});


// Route::get('/pembayaran', function () {
//     return view('pages.pembayaran');
// });
// Route::get('/data-diri', function () {
//     return view('pages.data-diri');
// });


Route::get('/pembayaran', function () {
    return view('pages.pembayaran');
});
Route::get('/page-konseling', function () {
    return view('pages.page-konseling');
});
Route::get('/data-diri', function () {
    return view('pages.data-diri');
});


