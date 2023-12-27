<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CustomerController;

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
Route::get('/', [AuthController::class, 'login']);
Route::get('forgot', [AuthController::class, 'forgot']);
Route::post('login_post',[AuthController::class,'login_post']);
Route::post('forgot_post',[AuthController::class,'forgot_post']);

Route::group(['middleware'=>'admin'],function(){

    Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);
    Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);
    Route::get('admin/customers', [CustomerController::class, 'customers']);
    Route::get('admin/customers/edit/{id}', [CustomerController::class, 'edit_customers']);
    Route::post('admin/customers/edit/{id}', [CustomerController::class, 'update_customers']);
    Route::get('admin/customers/delete/{id}', [CustomerController::class, 'delete_customers']);

});
Route::get('logout',[AuthController::class,'logout']);
