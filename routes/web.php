<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GreetingController;
use App\Http\Controllers\Auth\LoginController;

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

Route::get('/hello', [HomeController::class, 'hello']);
Route::get('/mail', [GreetingController::class, 'sendmail']);
Route::get('/admin-lte', [HomeController::class, 'adminLTE']);
Route::get('/all-user', [HomeController::class, 'allUser'])->name('user_about');
Route::get('/excel', [HomeController::class, 'excel'])->name('home');
Route::post('/emport-user', [HomeController::class, 'emportUser']);
Route::get('/export-user', [HomeController::class, 'exportUser']);


// Auth::routes();
Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
  ]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class,'logout'])->name('logout');
Route::get('/welcome', [App\Http\Controllers\HomeController::class,'welcome'])->name('welcome');
