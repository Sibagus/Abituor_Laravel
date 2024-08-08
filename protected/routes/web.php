<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TagihanController;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [LoginController::class, 'index']);
Route::post('valid-login', [LoginController::class, 'validLogin']);
Route::get('logout', [LoginController::class, 'logout']);

Route::get('user', [LoginController::class, 'user']);
Route::post('user', [LoginController::class, 'addUser']);
Route::post('reset', [LoginController::class, 'reset']);
Route::post('user-delete', [LoginController::class, 'hapus']);


// Route::middleware(['middlewere' => 'Login'], function () {
// });
Route::get('home', [HomeController::class, 'index']);

Route::get('tagihan', [TagihanController::class, 'index']);
Route::post('tagihan', [TagihanController::class, 'form']);
Route::post('tagihan-ajax', [TagihanController::class, 'get_ajax']);


// Route::get('/token', function () {
//     return csrf_token();
// });


Route::any('/token', [AuthController::class, 'token']);
//Route::match(array('POST', 'GET'), '/token', [AuthController::class, 'token']);
// Route::get('/api', [ApiController::class, 'index']);
// Route::get('/api/en/{var1}', [ApiController::class, 'en']);
// Route::get('/api/data', [ApiController::class, 'data']);

Route::any('/api', [ApiController::class, 'index']);
Route::any('/api/en/{var1}', [ApiController::class, 'en']);
Route::any('/api/data', [ApiController::class, 'data']);




// Route::post('/auth', AuthController::class)->name('login');
Route::match(array('POST', 'GET'), '/auth', AuthController::class)->name('login');