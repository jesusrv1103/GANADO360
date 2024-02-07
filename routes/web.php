<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FarmController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\HealthRecordController;
use App\Http\Controllers\WeightRecordController;
use App\Http\Controllers\ReproductiveEventController;

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
    return view('welcome');
});




Route::resource('farms', FarmController::class);
Route::resource('animals', AnimalController::class);
Route::resource('health_records', HealthRecordController::class);
Route::resource('weight_records', WeightRecordController::class);
Route::resource('reproductive_events', ReproductiveEventController::class);

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
