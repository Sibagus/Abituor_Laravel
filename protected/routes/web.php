<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TagihanController;
use App\Http\Controllers\GatewayController;
use App\Http\Middleware\TokenExpired;

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
Route::any('home', [HomeController::class, 'index']);

Route::get('tagihan', [TagihanController::class, 'index']);
Route::any('tagihan_filter', [TagihanController::class, 'index']);
Route::post('tagihan', [TagihanController::class, 'form']);
Route::post('tagihan-ajax', [TagihanController::class, 'get_ajax']);
Route::post('tagihan-delete', [TagihanController::class, 'hapus']);
Route::get('tagihan_excel', [TagihanController::class, 'tagihan_excel']);
Route::get('users/export/{tgl_awal}/{tgl_akhir}', [TagihanController::class, 'export']);


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


Route::get('get-debuglog', [GatewayController::class, 'getDebug']);
Route::get('inquiry', [GatewayController::class, 'inquiry']);
Route::get('reversal', [GatewayController::class, 'reversal']);
Route::get('payment', [GatewayController::class, 'payment']);
