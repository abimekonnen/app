<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IncidentController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\test;
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

// Route::get('/', function () {
//     return view('welcome');
// });
//Route::get('/m',[AtmController::class,'index']);
Route::resource('atm',  IncidentController::class);
Route::resource('export',  ExportController::class);
Route::redirect('/', '/atm');
//Route::resource('/create', AtmController::class);
//Route::get('create',[AtmController::class,'index']);
//Route::resource('/create', [AtmController::class,'create']);
//Route::resource('create', AtmController::class);