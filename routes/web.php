<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\CarModelController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\ReservationControlle;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// Show login form
Route::get('login', function () {
    return view('auth.login');
})->name('login');


Route::post('login', [UserController::class, 'login']);
Route::get('cars', [CarController::class, 'showindex']);
Route::get('reservations', [ReservationControlle::class, 'showindex']);
Route::get('customers', [CustomerController::class, 'showindex']);
Route::get('models', [CarModelController::class, 'showindex']);


Route::get('register', function () {
    return view('register');
})->name('register');


Route::post('register', [UserController::class, 'register']);


Route::get('forgotpassword', function () {
    return view('auth.forgotpassword');
})->name('forgotpassword');

// Handle password reset request form submission
Route::post('password/email', function () {
    // Password reset logic goes here
    // For now, it could redirect back or show a message
    return redirect()->back()->with('status', 'Password reset link sent!');
});
Route::get('/login', function () {
    return view('auth.login'); // Ensure this view exists in resources/views
})->name('login');
Route::get('forgotpassword', function () {
    return view('auth.forgotpassword');
})->name('forgotpassword');
// Dashboard or any protected route (example)
Route::middleware('auth')->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('cars', CarController::class);
Route::resource('models', CarModelController::class);
Route::resource('types', TypeController::class);

// Reservation Management Routes
Route::post('reservations/{reservation}/update-status', [ReservationControlle::class, 'updateStatus'])->name('reservations.updateStatus');
Route::get('/reservations/{id}/download', [ReservationControlle::class, 'download'])->name('reservations.download');
Route::resource('reservations', ReservationControlle::class);

// Customer Management Routes
Route::resource('customers', CustomerController::class);


Route::resource('payments', PaymentController::class);
Route::get('/sidebar', function () {
    return view('partitions.sidebar'); // Ensure this view exists in resources/views
})->name('sidebar');

// Reporting Routes
Route::get('reports/rental-history', [ReservationControlle::class, 'rentalHistory'])->name('reports.rentalHistory');
Route::get('/items', [ItemController::class, 'showIndex'])->name('items.index');
// Item Management Routes
Route::get('/items/create', [ItemController::class, 'create'])->name('items.create'); // Show form to create an item
Route::post('/items', [ItemController::class, 'store'])->name('items.store'); // Handle form submission to store an item

// Views Routes
Route::get('/', function () {
    return view('auth.login');

});
Route::get('/register', function () {
    return view('auth.register'); // Ensure this view file exists in resources/views
})->name('register');

Route::get('/chart', function () {
    return view('partitions.charts');
});
Route::get('/table', function () {
    return view('partitions.table');
});
Route::get('/index', function () {
    return view('partitions.index');
});
Route::get('/sidebar', function () {
    return view('partitions.sidebar'); // Ensure this view file exists in resources/views
})->name('partitions.sidebar');
