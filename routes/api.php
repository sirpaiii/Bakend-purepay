<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryProductController;
use App\Http\Controllers\TransactionsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PeopleController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');




Route::post('/registerFirebase', [AuthController::class, 'registerFirebase']);
Route::post('/loginFirebase', [AuthController::class, 'loginFirebase']);

Route::apiResource('category-products', CategoryProductController::class);
Route::apiResource('products', ProductController::class);


    Route::post('/payment/create', [TransactionsController::class, 'createVA']);
    Route::get('/payment/status/{id}', [TransactionsController::class, 'getStatus']);

// Callback tetap public (karena datang dari server Duitku, bukan user)
Route::post('/payment/callback', [TransactionsController::class, 'handleCallback']);

Route::get('/people/{id}', [PeopleController::class, 'show']);
