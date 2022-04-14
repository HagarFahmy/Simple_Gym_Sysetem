<?php

use App\Http\Controllers\Backend\AdminAuthController;
use App\Http\Controllers\Backend\TrainingPackagesController;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Backend\CityManagerController;
use \App\Http\Controllers\Backend\CoachController;
use \App\Http\Controllers\Backend\CitiesController;
use App\Http\Controllers\Backend\GymsController;
use \App\Http\Controllers\Backend\TrainingSessionsController;
use \App\Http\Controllers\Backend\UserController;
use \App\Http\Controllers\Backend\AttendenceController;
use \App\Http\Controllers\Backend\BuyPackageController;
use \App\Http\Controllers\Backend\RevenueController;



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
    Route::resource('training-packages', TrainingPackagesController::class);
    Route::Resource('users',UserController::class);
    Route::Resource('gyms',GymsController::class);
    Route::Resource('attendance',AttendenceController::class);
    // By package
    Route::get('/create', [BuyPackageController::class, 'create'])->name('buy-package.create');
    Route::post('/store', [BuyPackageController::class, 'store'])->name('buy-package.store');
    Route::get('/stripe', [BuyPackageController::class, 'stripe'])->name('buy-package.stripe');
    Route::post('/single-charge',[BuyPackageController::class, 'singleCharge'])->name('single.charge');

    Route::Resource('revenue',RevenueController::class);
    Route::get('/total-revenue', [RevenueController::class, 'totalRevenue'])->name('revenue.total');

    Route::get('logout', [AdminAuthController::class, 'logout'])->name('logout');
});

//Route::get('attendence',[ AttendenceController::class ,'index'])->name('attendence.index');;
