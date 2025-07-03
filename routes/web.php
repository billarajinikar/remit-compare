<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\RemittanceController;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sample',[JobController::class, 'storeRatesFromMonito']);

Route::get('/contact-us', function () {
    return view('remittance.contact');
});
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

Route::post('/subscribe', [ContactController::class, 'subscribe'])->name('subscribe');


Route::get('/remittance', [RemittanceController::class, 'index'])->name('remittance.index');
Route::get('/remittance/search', [RemittanceController::class, 'search'])->name('remittance.search');
