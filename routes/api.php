<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryProductController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PeopleController;
use App\Http\Controllers\TransferController;
use App\Http\Controllers\TopupController;
use App\Http\Controllers\ProductTransactionController;
// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');




Route::post('/registerFirebase', [AuthController::class, 'registerFirebase']);
Route::post('/loginFirebase', [AuthController::class, 'loginFirebase']);


//Category Product
Route::get('category-products', [CategoryProductController::class, 'index']);
Route::post('category-products', [CategoryProductController::class, 'store']);
Route::get('category-products/{id}', [CategoryProductController::class, 'show']);
Route::put('category-products/{id}', [CategoryProductController::class, 'update']);
Route::patch('category-products/{id}', [CategoryProductController::class, 'update']); 
Route::delete('category-products/{id}', [CategoryProductController::class, 'destroy']);

// Product
Route::get('/products', [ProductController::class, 'index']);
Route::post('/products', [ProductController::class, 'store']);
Route::get('/products/{id}', [ProductController::class, 'show']);
Route::put('/products/{id}', [ProductController::class, 'update']);
Route::patch('/products/{id}', [ProductController::class, 'update']);
Route::delete('/products/{id}', [ProductController::class, 'destroy']);
Route::get('/products/category/{id}', function ($id) {
    return \App\Models\Product::where('category_id', $id)->get();
});


// People
Route::get('/people', [PeopleController::class, 'index']);
Route::get('/people/{id}', [PeopleController::class, 'show']);
Route::put('/people/{id}', [PeopleController::class, 'update']);
Route::patch('/people/{id}', [PeopleController::class, 'update']);
Route::delete('/people/{id}', [PeopleController::class, 'destroy']);


Route::post('/transfer', [TransferController::class, 'transfer']);

Route::post('/topup', [TopupController::class, 'requestTopup']);
Route::post('/topup/callback', [TopupController::class, 'handleCallback']);
Route::get('/topup/history/{user_id}', [TopupController::class, 'history']);

Route::post('/product/buy', [ProductTransactionController::class, 'buy']);
Route::post('/product/callback', [ProductTransactionController::class, 'handleCallback']);
Route::get('/product/history/{user_id}', [ProductTransactionController::class, 'history']);