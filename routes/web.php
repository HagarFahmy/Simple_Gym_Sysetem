<?php

use App\Http\Controllers\Backend\AdminAuthController;
use App\Http\Controllers\Backend\TrainingPackagesController;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Backend\CityManagerController;
use \App\Http\Controllers\Backend\GymManagerController;
use \App\Http\Controllers\Backend\CoachController;
use \App\Http\Controllers\Backend\CitiesController;
use App\Http\Controllers\Backend\GymsController;
use \App\Http\Controllers\Backend\TrainingSessionsController;
use \App\Http\Controllers\Backend\UserController;
use \App\Http\Controllers\Backend\AttendenceController;
use \App\Http\Controllers\Backend\BuyPackageController;
use \App\Http\Controllers\Backend\RevenueController;
use \App\Http\Controllers\Auth\ForgotPasswordController;
use \App\Http\Controllers\Auth\ResetPasswordController;



use Illuminate\Support\Facades\Auth;



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

///////////////
Route::post('admin-password/email',[ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('admin-password/reset',[ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('admin-password/reset',[ResetPasswordController::class, 'reset'])->name('password.update');
    Route::get('admin-password/reset/{token}',[ResetPasswordController::class, 'showResetForm'])->name('password.reset');
///////////////
Route::group(['middleware' => ['admin:admin','isbanned'], 'prefix' => 'dashboard/', 'as' => 'dashboard.'], function () {
    Route::get('home', [\App\Http\Controllers\Backend\HomeController::class, 'index'])->name('home');
   
    Route::Resource('city-managers',CityManagerController::class);
    Route::Resource('gym-managers',GymManagerController::class);
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

    // ban and un ban gym manager
    Route::post('gym-managers/{id}/ban', [GymManagerController::class, 'ban'])->name('gym-managers.ban');

    
    Route::get('logout', [AdminAuthController::class, 'logout'])->name('logout');
});

//Route::get('attendence',[ AttendenceController::class ,'index'])->name('attendence.index');;
