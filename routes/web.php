<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

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

Route::group(['middleware'=>'admin'],function(){

    Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);

});
Route::get('logout',[AuthController::class,'logout']);
