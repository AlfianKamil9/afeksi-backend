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
<<<<<<< HEAD
    return view('pages.landing_page');
});


Route::get('/beranda', function () {
    return view('pages.landing_page');
})->middleware(['auth', 'verified'])->name('beranda');

require __DIR__ . '/auth.php';




// frontend
Route::get('/psikolog', function () {
    return view('pages.psikolog');
});
Route::get('/profesional-konseling', function () {
    return view('pages.profesional-konseling-online-senior');
});

=======
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
>>>>>>> 091ea7903627df7a979d03ee98c1915980341eb1
