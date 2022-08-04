<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('/mail', [HomeController::class, 'sendmail']);
Route::get('/admin-lte', [HomeController::class, 'adminLTE']);
Route::get('/all-user', [HomeController::class, 'allUser'])->name('user_about');
Route::get('/excel', [HomeController::class, 'excel'])->name('home');
Route::post('/emport-user', [HomeController::class, 'emportUser']);
Route::get('/export-user', [HomeController::class, 'exportUser']);

