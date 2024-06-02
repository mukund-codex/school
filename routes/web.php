<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::post('login-handler', [\App\Http\Controllers\UserController::class, 'loginHandler'])->name('login-handler');


require __DIR__.'/auth.php';


//VLCCKabir@202401
//07059939335
