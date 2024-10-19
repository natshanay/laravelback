<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\ReservationControlle;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\CarModelController;
use App\Http\Controllers\CarController;

use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\ProductControllerr;
use App\Http\Controllers\CarImageController;
use App\Http\Controllers\ApiModelController;



Route::apiResource('posts', PostController::class); // Handles CRUD operations for posts
Route::get('items', [ItemController::class, 'index']); // Fetch all items
Route::get('customers', [CustomerController::class, 'showindex']); // Fetch all customers
Route::get('payments', [PaymentController::class, 'showindex']); // Fetch all payments
Route::get('models', [CarModelController::class, 'showindex']); // Fetch all car models
Route::get('cars', [CarController::class, 'showindex']); // Fetch all cars
Route::get('images', [CarImageController::class, 'showindex']); // Fetch all images
Route::get('reservations', [ReservationControlle::class, 'showindex']); // Fetch all images
Route::post('user', [AuthController::class, 'index']); // Fetch all images
Route::resource('createpost',ProductControllerr::class);
Route::resource('createmodel',ApiModelController::class);

// Route::prefix('cart')->group(function () {
//     Route::post('add', [CartController::class, 'add']); // Ensure this matches the API call
//     Route::get('/', [CartController::class, 'index']); // View cart
//     Route::post('update', [CartController::class, 'update']); // Update item quantity
//     Route::post('remove', [CartController::class, 'remove']); // Remove item from cart
//     Route::post('clear', [CartController::class, 'clear']); // Clear the cart
// });




Route::post('/addtocart', [CartController::class, 'addToCart']);
Route::get('/products', [CartController::class, 'index']);
Route::get('/products/{id}', [CartController::class, 'show']);
Route::put('products/{id}', [CartController::class, 'update']);
Route::delete('products/{id}', [CartController::class, 'destroy']);


Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);
Route::post('reactregister', [UserController::class, 'reactregister']);

Route::middleware('auth:api')->group(function () {
    Route::get('user', [UserController::class, 'me']);
    Route::post('logout', [UserController::class, 'logout']);
    Route::post('refresh', [UserController::class, 'refresh']);
});
