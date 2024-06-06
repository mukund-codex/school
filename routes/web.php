<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::post('/login-handler', [UserController::class, 'loginHandler'])->name('login-handler');
Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');

require __DIR__.'/auth.php';


//VLCCKabir@202401
//07059939335
