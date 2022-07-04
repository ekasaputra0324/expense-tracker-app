<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MutationController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

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
// dashboard / home
Route::controller(HomeController::class)->group(function(){
    Route::get('/dashboard','index')->name('dashboard')->middleware('auth');
});
// login
Route::controller(LoginController::class)->group(function(){
    Route::get('/','index')->name('login')->middleware('guest');
    Route::post('/login', 'authenticate')->name('authenticate');
    Route::post('/logout', 'logout')->name('logout');
});
// register
Route::controller(RegisterController::class)->group(function(){
    Route::get('/register','index')->name('register')->middleware('guest');
    Route::post('/register', 'store')->name('store');
});
// mutasi
Route::controller(MutationController::class)->group(function(){
    Route::get('/mutation','index')->name('mutation')->middleware('auth');
    Route::get('/mutation/debit','debit')->name('credit')->middleware('auth');
    Route::get('/mutation/credit','credit')->name('debit')->middleware('auth');
});
