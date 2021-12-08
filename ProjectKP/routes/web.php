<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KPController;
use App\Http\Controllers\KaryawanController;

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
    return view('welcome');
});

Route::get('/home', [KaryawanController::class,'index']);
Route::get('/karyawan', [KaryawanController::class,'show'])->name('karyawan');
Route::get('/create', [KaryawanController::class,'create']);
Route::post('/karyawan/store', [KaryawanController::class,'store']);
Route::get('/edit/{id}',[KaryawanController::class,'edit']);
Route::post('/update',[KaryawanController::class,'update']);
Route::get('/destroy/{id}',[KaryawanController::class,'destroy']);
