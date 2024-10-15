<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Only authenticated and verified users can access the dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Routes accessible by all authenticated users
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin-specific route, only accessible by users with 'admin' role
Route::get('/admin', function () {
    return 'Admin Page';
})->middleware('role:admin');

// Example route for registered visitors
Route::get('/registered-user', function () {
    return 'Registered Visitor Page';
})->middleware('role:registered_visitor');

// Example route for visitors (optional if you want different levels of access)
Route::get('/visitor', function () {
    return 'Visitor Page';
})->middleware('role:visitor');

// Authentication routes
require __DIR__.'/auth.php';
