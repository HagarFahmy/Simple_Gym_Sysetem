<?php

use App\Http\Controllers\Backend\AdminAuthController;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Backend\CityManagerController;
use \App\Http\Controllers\Backend\CoachController;
use \App\Http\Controllers\Backend\CitiesController;
use App\Http\Controllers\Backend\GymsController;
use \App\Http\Controllers\Backend\TrainingSessionsController;
use \App\Http\Controllers\Backend\UserController;
use \App\Http\Controllers\Backend\AttendenceController;



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
    Route::Resource('coaches',CoachController::class);
    Route::resource('cities',CitiesController::class);
    Route::resource('training-sessions',TrainingSessionsController::class);
    Route::Resource('users',UserController::class);
    Route::Resource('gyms',GymsController::class);
    Route::Resource('attendance',AttendenceController::class);


    Route::get('logout', [AdminAuthController::class, 'logout'])->name('logout');
});

//Route::get('attendence',[ AttendenceController::class ,'index'])->name('attendence.index');;
