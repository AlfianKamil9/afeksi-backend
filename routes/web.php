<?php


use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\forgotPasswordController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::get('/register', function () {
//     return view('pages.register');
// });

// Route::get('/forgot-password', [forgotPasswordController::class, 'showForgotPassword']);
// Route::post('/forgot-password', [forgotPasswordController::class, 'sendForgotPassword'])->name('sendForgotPassword');
// Route::get('/reset-password/{token}', [forgotPasswordController::class, 'showResetPassword']);
// Route::post('/reset-password/{token}', [forgotPasswordController::class, 'submitResetPassword'])->name('submitResetPassword');

// Route::get('/home', function () {
//     return view('auth.login');
// });


require __DIR__.'/auth.php';

