<?php

use Illuminate\Http\Client\Request;
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

Route::get('/login', function () {
    return view('pages.login');
});

Route::get('/register', function () {
    return view('pages.register');
});

Route::get('/forgot-password', [forgotPasswordController::class, 'showForgotPassword']);
Route::post('/forgot-password', [forgotPasswordController::class, 'sendForgotPassword'])->name('sendForgotPassword');
Route::get('/reset-password/{token}', [forgotPasswordController::class, 'showResetPassword']);
Route::post('/reset-password/{token}', [forgotPasswordController::class, 'submitResetPassword'])->name('submitResetPassword');

