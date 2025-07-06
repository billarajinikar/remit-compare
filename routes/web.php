<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\RemittanceController;
use App\Http\Controllers\ContactController;

Route::get('/', [RemittanceController::class, 'index'])->name('remittance.index');


Route::get('/sample',[JobController::class, 'storeRatesFromMonito']);

Route::get('/contact-us', function () {
    return view('pages.contact');
});
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

Route::post('/subscribe', [ContactController::class, 'subscribe'])->name('subscribe');

Route::view('/faq', 'pages.faq')->name('faq');
Route::view('/terms', 'pages.terms')->name('terms');
Route::view('/privacy', 'pages.privacy')->name('privacy');


Route::get('/remittance', [RemittanceController::class, 'index'])->name('remittance.index');
Route::get('/remittance/search', [RemittanceController::class, 'search'])->name('remittance.search');

Route::view('/blog', 'pages.blog')->name('blog');

