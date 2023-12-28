<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MedicineController;

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
    Route::get('admin/customers', [CustomerController::class, 'customers']);
    Route::get('admin/customers/add', [CustomerController::class, 'add_customers']);
    Route::post('admin/customers/add', [CustomerController::class, 'insert_add_customers']);
    Route::get('admin/customers/edit/{id}', [CustomerController::class, 'edit_customers']);
    Route::post('admin/customers/edit/{id}', [CustomerController::class, 'update_customers']);
    Route::get('admin/customers/delete/{id}', [CustomerController::class, 'delete_customers']);

    //medicines starts
    Route::get('admin/medicines', [MedicineController::class, 'medicines']);
    Route::get('admin/medicines/add', [MedicineController::class, 'add_medicines']);
    Route::post('admin/medicines/add', [MedicineController::class, 'insert_add_medicines']);
    Route::get('admin/medicines/edit/{id}', [MedicineController::class, 'edit_medicines']);
    Route::post('admin/medicines/edit/{id}', [MedicineController::class, 'update_medicines']);
    Route::get('admin/medicines/delete/{id}', [MedicineController::class, 'delete_medicines']);
    //medicines end
    Route::get('admin/medicines_stock', [MedicineController::class, 'medicines_stock_list']);
    Route::get('admin/medicines_stock/add', [MedicineController::class, 'medicines_stock_add']);
    Route::post('admin/medicines_stock/add', [MedicineController::class, 'medicines_stock_store']);
    Route::get('admin/medicines_stock/edit/{id}', [MedicineController::class, 'medicines_stock_edit']);
    Route::post('admin/medicines_stock/edit/{id}', [MedicineController::class, 'medicines_stock_update']);
    Route::get('admin/medicines_stock/delete/{id}', [MedicineController::class, 'medicines_stock_delete']);




});
Route::get('logout',[AuthController::class,'logout']);
