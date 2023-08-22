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

use App\Http\Controllers\API\KlaimCode;
use App\Models\Event;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Transaksi\Event\WebinarTransaksiController;

Route::post('/checkout', [WebinarTransaksiController::class, 'checkout']);

Route::get('tetet', function() {
    $query = Event::with('webinar_session.pembicara')
        ->where('activity_category_event', 'WEBINAR')->orderBy('date_event', 'desc')->get();
    return response($query);
});

Route::post('/claim-voucher', [KlaimCode::class, 'claim']);