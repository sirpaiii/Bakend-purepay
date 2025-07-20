<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\TestimonialController;






Route::get('/', [LandingController::class, 'index']);
Route::post('/testimoni', [TestimonialController::class, 'store'])->name('testimoni.submit');
