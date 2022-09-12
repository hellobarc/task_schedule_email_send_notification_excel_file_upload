<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GreetingController;
use App\Http\Controllers\emailSendingController;
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
//mail sending route with controller
// Route::get('/mail', [GreetingController::class, 'sendmail']);
// Route::get('/email', [GreetingController::class, 'emailSending']);
Route::get('/email-sending', [EmailSendingController::class, 'emailSend'])->name('email-sending');

Route::get('/admin-lte', [HomeController::class, 'adminLTE']);
Route::get('/all-user', [HomeController::class, 'allUser'])->name('user_about');
Route::get('/excel', [HomeController::class, 'excel'])->name('home');
Route::post('/emport-user', [HomeController::class, 'emportUser']);
Route::get('/export-user', [HomeController::class, 'exportUser']);
// Admin panel start
//group management
Route::get('/all-group', [HomeController::class, 'allGroup'])->name('all_group');
Route::get('/create-group', [HomeController::class, 'createGroup']);
Route::post('/save-group', [HomeController::class, 'saveGroup']);
Route::get('/group-edit/{id}', [HomeController::class, 'editGroup']);
Route::post('/group-update/{id}', [HomeController::class, 'updateGroup']);
Route::post('/group-delete/{id}', [HomeController::class, 'deleteGroup']);
//event management
Route::get('/all-event', [HomeController::class, 'allEvent'])->name('all_event');
Route::get('/create-event', [HomeController::class, 'createEvent']);
Route::post('/save-event', [HomeController::class, 'saveEvent']);
Route::get('/event-edit/{id}', [HomeController::class, 'editEvent']);
Route::post('/event-update/{id}', [HomeController::class, 'updateEvent']);
Route::post('/event-delete/{id}', [HomeController::class, 'deleteEvent']);
// event email sending route
Route::get('/all-event-email', [HomeController::class, 'allEventEamil'])->name('all_event_email');
Route::get('/create-event-email', [HomeController::class, 'createEventEamil']);
Route::post('/save-event-email', [HomeController::class, 'saveEventEamil']);
Route::get('/event-email-edit/{id}', [HomeController::class, 'editEventEamil']);
Route::post('/event-email-update/{id}', [HomeController::class, 'updateEventEamil']);
Route::post('/event-email-delete/{id}', [HomeController::class, 'deleteEventEamil']);
// create a campaign route
Route::get('/all-campaign', [HomeController::class, 'allCampaign'])->name('all_campaign');
Route::get('/create-campaign', [HomeController::class, 'createCampaign']);
Route::post('/save-campaign', [HomeController::class, 'saveCampaign']);
Route::get('/campaign-edit/{id}', [HomeController::class, 'editCampaign']);
Route::post('/campaign-update/{id}', [HomeController::class, 'updateCampaign']);
Route::post('/campaign-delete/{id}', [HomeController::class, 'deleteCampaign']);
// Admin panel end
// Auth::routes();
Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
  ]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class,'logout'])->name('logout');
Route::get('/welcome', [App\Http\Controllers\HomeController::class,'welcome'])->name('welcome');
