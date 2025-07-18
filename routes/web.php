<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\RemittanceController;
use App\Http\Controllers\ContactController;

Route::get('/', [RemittanceController::class, 'index'])->name('remittance.index');


Route::get('/sample',action: [JobController::class, 'storeRatesFromMonito']);
Route::get('/process',action: [JobController::class, 'processMonitoRawToRates']);



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
Route::view('/blog/top-5-money-transfer-services-from-Sweden-SEK-to-India-INR', 'blogs.top-5-remittance-services')->name('top-5-remittance-services');
Route::view('/blog/How-NRIs-in-Sweden-Can-Build-a-Solid-Financial-Future-in-India', 'blogs.NRIs-in-Sweden')->name('NRIs-in-Sweden');
