<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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


Route::middleware('auth')->group(function () {
    Route::view('/rooms-view', 'roomsview')->name('rooms.view');
});

Route::middleware('auth')->group(function () {
    Route::view('/booking-view', 'bookingview')->name('booking.view');
});

Route::middleware('auth')->group(function () {
    Route::view('/bookinglist-view', 'bookinglistview')->name('bookinglist.view');
});

Route::middleware('auth')->group(function () {
    Route::view('/guest-view', 'guestview')->name('guest.view');
});

Route::middleware('auth')->group(function () {
    Route::view('/payment-view', 'paymentview')->name('payment.view');
});

require __DIR__.'/auth.php';
