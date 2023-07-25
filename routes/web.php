<?php


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
});


Route::get('/beranda', function () {
    return view('pages.landing_page');
})->middleware(['auth', 'verified'])->name('beranda');

require __DIR__ . '/auth.php';

Route::get('/psikolog', function () {
    return view('pages.psikolog');
});
Route::get('/profesional-konseling', function () {
    return view('pages.profesional-konseling-online-senior');
});

