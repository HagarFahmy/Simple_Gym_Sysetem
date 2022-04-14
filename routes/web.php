<?php

use App\Http\Controllers\Backend\AdminAuthController;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Backend\CityManagerController;
use \App\Http\Controllers\Backend\GymManagerController;
use \App\Http\Controllers\Backend\CoachController;
use \App\Http\Controllers\Backend\CitiesController;
use \App\Http\Controllers\Backend\TrainingSessionsController;
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

//Auth::routes();


Config::set('auth.defines', 'admin');


Route::get('dashboard/login', [AdminAuthController::class, 'login'])->name('loginPage');
Route::post('dashboard/login', [AdminAuthController::class, 'doLogin'])->name('dashboard.login');

Route::group(['middleware' => 'admin:admin', 'prefix' => 'dashboard/', 'as' => 'dashboard.'], function () {

    Route::get('home', [\App\Http\Controllers\Backend\HomeController::class, 'index'])->name('home');
    Route::Resource('city-managers',CityManagerController::class);
    Route::Resource('gym-managers',GymManagerController::class);
    Route::Resource('coaches',CoachController::class);
    Route::resource('cities',CitiesController::class);
    Route::resource('training-sessions',TrainingSessionsController::class);

    Route::get('logout', [AdminAuthController::class, 'logout'])->name('logout');
});
