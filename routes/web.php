<?php

use App\Http\Controllers\SessionController;
use App\Http\Controllers\warnaController;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('/sesi/dasbord');
});
Route::resource('warna',warnaController::class);
Route::get('/sesi',[SessionController::class,'dasbord']);
Route::post('/sesi/login',[SessionController::class,'login']);
Route::get('/sesi/logout',[SessionController::class,'logout']);
Route::get('/sesi/register',[SessionController::class,'register']);
Route::post('/sesi/create',[SessionController::class,'create']);
Route::post('pencarian_warna',[SessionController::class,'pencarian_warna']);
Route::get('cetak_pdf', [warnaController::class,'cetak_pdf']);