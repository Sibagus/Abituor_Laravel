<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ApiController;


Route::post('/login', AuthController::class)->name('login');

// Route::middleware('auth:api')->get('/va/{var1?}', [ApiController::class, 'va']);

// Route::group(['middleware' => 'auth:api', 'isActiveToken'], function () {
//     Route::get('/va/{var1?}', [ApiController::class, 'va']);

//     Route::post('/create_va', [ApiController::class, 'create_va']);

//     Route::post('/update_va', [ApiController::class, 'update_va']);

//     Route::post('/delete_va', [ApiController::class, 'delete_va']);
// });


Route::group(['middleware' => 'auth:api', 'isActiveToken'], function () {
    Route::any('/va/{var1?}', [ApiController::class, 'va']);

    Route::any('/create_va', [ApiController::class, 'create_va']);

    Route::any('/update_va', [ApiController::class, 'update_va']);

    Route::any('/delete_va', [ApiController::class, 'delete_va']);
});


