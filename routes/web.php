<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\SiteController::class, 'index'])->name('index');
Route::get('/payments', [\App\Http\Controllers\SiteController::class, 'payments'])
    ->middleware('auth')
    ->name('payments');

Route::get('/update_rates', [\App\Http\Controllers\CurrencyController::class, 'update']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::post('/payment/pay', [\App\Http\Controllers\PaymentController::class, 'pay'])
    ->middleware('auth');
