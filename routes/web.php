<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DevicesController;
use App\Http\Controllers\HashrateController;
use App\Http\Controllers\CalcController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('pages/dashboard');
});
Route::get('/device-list',[DevicesController::class, 'index']);
Route::post('/device-list/add',[DevicesController::class, 'store']);

Route::get('/algo',[HashrateController::class, 'index']);
Route::get('/algo/{id}',[HashrateController::class, 'indexspec']);
Route::post('/algo/add',[HashrateController::class, 'store']);

Route::get('/calculate',[CalcController::class, 'index']);
Route::post('/calculate',[CalcController::class, 'result']);

Route::get('/compare',[CalcController::class, 'compare']);
Route::post('/compare',[CalcController::class, 'comparehasil']);
