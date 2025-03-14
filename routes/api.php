<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RentalController;
use Illuminate\Support\Facades\Route;


Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
});



Route::middleware('auth:sanctum')->group(function () {

    Route::resource('cars', CarController::class);
    Route::resource('rentals', RentalController::class);

    Route::post('pay', [PaymentController::class, 'pay']);

});
