<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\WebsiteLogoController;

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
    //suppliers start
    Route::get('admin/suppliers', [SupplierController::class, 'index']);
    Route::get('admin/suppliers/add', [SupplierController::class, 'create']);
    Route::post('admin/suppliers/add', [SupplierController::class, 'store']);
    Route::get('admin/suppliers/edit/{id}', [SupplierController::class, 'edit']);
    Route::post('admin/suppliers/edit/{id}', [SupplierController::class, 'update']);
    Route::get('admin/suppliers/delete/{id}', [SupplierController::class, 'delete']);

    //suppliers end

    //invoices starts
    Route::get('admin/invoices', [InvoiceController::class, 'index']);
    Route::get('admin/invoices/add', [InvoiceController::class, 'create']);
    Route::post('admin/invoices/add', [InvoiceController::class, 'store']);
    Route::get('admin/invoices/edit/{id}', [InvoiceController::class, 'edit']);
    Route::post('admin/invoices/edit/{id}', [InvoiceController::class, 'update']);
    Route::get('admin/invoices/delete/{id}', [InvoiceController::class, 'delete']);
    //purchases starts
    Route::prefix('admin/purchases/')->group(function () {
        Route::get('', [PurchaseController::class, 'index']);
        Route::get('add', [PurchaseController::class, 'create']);
        Route::post('add', [PurchaseController::class, 'store']);
        Route::get('edit/{id}', [PurchaseController::class, 'edit']);
        Route::post('edit/{id}', [PurchaseController::class, 'update']);
        Route::get('delete/{id}', [PurchaseController::class, 'delete']);

    });
    //my account
    Route::get('admin/my_account', [DashboardController::class, 'my_account']);
    Route::post('admin/my_account', [DashboardController::class, 'my_account_update']);
    //website logo
    Route::get('admin/website_logo', [WebsiteLogoController::class, 'website_logo']);
    Route::post('admin/website_logo_update', [WebsiteLogoController::class, 'website_logo_update']);


});
Route::get('logout',[AuthController::class,'logout']);
