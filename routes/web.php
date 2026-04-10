<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\PaymentController;
use App\Models\Booking;


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

    Route::get('/rooms', [RoomController::class, 'index'])->name('rooms.index');
    Route::post('/rooms', [RoomController::class, 'store'])->name('rooms.store');
    Route::put('/rooms/{id}', [RoomController::class, 'update'])->name('rooms.update');
    Route::delete('/rooms/{id}', [RoomController::class, 'destroy'])->name('rooms.destroy');

    Route::get('/bookings', [BookController::class, 'index'])->name('bookings.index');
    Route::post('/bookings', [BookController::class, 'store'])->name('bookings.store');
    Route::put('/bookings/{id}', [BookController::class, 'update'])->name('bookings.update');
    Route::delete('/bookings/{id}', [BookController::class, 'destroy'])->name('bookings.destroy');

    Route::get('/booking-list', [BookController::class, 'list'])
        ->name('bookinglist.index');

    Route::get('/guests', [GuestController::class, 'index'])->name('guests.index');
    Route::post('/guests', [GuestController::class, 'store'])->name('guests.store');
    Route::put('/guests/{id}', [GuestController::class, 'update'])->name('guests.update');
    Route::delete('/guests/{id}', [GuestController::class, 'destroy'])->name('guests.destroy');

    Route::get('/payments', [PaymentController::class, 'index'])->name('payments.index');
    Route::post('/payments', [PaymentController::class, 'store'])->name('payments.store');
    Route::put('/payments/{id}', [PaymentController::class, 'update'])->name('payments.update');
    Route::delete('/payments/{id}', [PaymentController::class, 'destroy'])->name('payments.destroy');

});

require __DIR__.'/auth.php';