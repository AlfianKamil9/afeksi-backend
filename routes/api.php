<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
// */
// Route::middleware('auth:sanctum')->group(function () {
//     Route::get('/user', function (Request $request) {
//         return $request->user();
//     });
//     Route::post('/logout', [LoginController::class, 'logout']);
// });

use App\Models\Event;
use Illuminate\Support\Facades\Route;
use App\Models\LayananNonProfessional;
use App\Http\Controllers\API\KlaimCode;
use App\Http\Controllers\API\HandleAfterPayment;
use App\Http\Controllers\Transaksi\Event\WebinarTransaksiController;

//MIDTRANS NOTIFICATION
Route::post('/midtrans/notification-hooks', HandleAfterPayment::class);




// YANG HANYA TEST
Route::post('/checkout', [WebinarTransaksiController::class, 'checkout']);
// Route::get('tetet', function() {
//     $query = Event::with('webinar_session.pembicara')
//         ->where('activity_category_event', 'WEBINAR')->orderBy('date_event', 'desc')->get();
//     return response($query);
// });

Route::get('/cek-psikolog-layanan', function() {
    $t = LayananNonProfessional::with('paket_layanan_non_professionals', 'psikolog_non_profesional')->where('id', 4)->first();
    return response($t);
});

Route::post('/claim-voucher', [KlaimCode::class, 'claim']);