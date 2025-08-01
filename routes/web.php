<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\TripRequestController;
use App\Models\Trip;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('home');
})->name('home');

// صفحة الرحلات
Route::get('/trips', function () {
    $trips = Trip::all();
    return view('trips', compact('trips'));
})->name('trips.index');

// صفحة التوصيات
Route::middleware(['auth'])->group(function () {
    Route::get('/contact', [ContactController::class, 'show'])->name('contact');
    Route::post('/contact', [ContactController::class, 'store'])->name('contact.submit');
});

// لوحة التحكم (فقط للأدمن)
Route::middleware(['auth', \App\Http\Middleware\AdminMiddleware::class])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/dashboard/requests', [TripRequestController::class, 'index'])->name('requests.index');
    Route::delete('/dashboard/requests/{id}', [TripRequestController::class, 'destroy'])->name('requests.destroy');

    Route::get('/trips/{id}/edit', [TripController::class, 'edit'])->name('trips.edit');
    Route::put('/trips/{id}', [TripController::class, 'update'])->name('trips.update');

    Route::get('/add-trip', [TripController::class, 'create'])->name('trips.create');
    Route::post('/add-trip', [TripController::class, 'store'])->name('trips.store');

    // ✅ مسار حذف التوصية (للمدير)
    Route::delete('/dashboard/contacts/{id}', [ContactController::class, 'destroy'])->name('contact.destroy');
});

// صفحة الحجز وارسال الطلب
Route::middleware(['auth'])->group(function () {
    Route::get('/request-trip/{id}', [TripController::class, 'request'])->name('trip.request');
    Route::post('/submit-request', [TripRequestController::class, 'store'])->name('trip.submit');
});

Auth::routes();