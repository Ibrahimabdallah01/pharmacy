<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\MedicinesController;
use App\Http\Controllers\PurchasesController;
use App\Http\Controllers\SuppliersController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;






Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('login_post', [AuthController::class, 'login_post'])->name('login_post');

Route::get('forgot', [AuthController::class, 'forgot'])->name('forgot');
Route::post('forgot_post',[AuthController::class, 'forgot_post'])->name('forgot_post');

Route::get('reset/{token}', [AuthController::class, 'getReset'])->name('reset');
Route::post('reset', [AuthController::class, 'postReset'])->name('reset.post');


Route::middleware([AdminMiddleware::class])->group(function () {
    Route::get('admin/dashboard', [DashboardController::class, 'Dashboard'])->name('admin.dashboard');

    //customers
    Route::get('admin/customers', [CustomersController::class, 'customers'])->name('admin.customers');
    Route::get('admin/customers/add', [CustomersController::class, 'add_customers'])->name('admin.customers.add');
    Route::post('admin/customers/add', [CustomersController::class, 'store'])->name('admin.customers.store');
    Route::get('admin/customers/edit/{id}', [CustomersController::class, 'edit'])->name('admin.customers.edit');
    Route::delete('admin/customers/delete/{id}', [CustomersController::class, 'destroy'])->name('admin.customers.delete');
    Route::put('admin/customers/update/{id}', [CustomersController::class, 'update'])->name('admin.customers.update');


    //medicines
    Route::get('admin/medicines', [MedicinesController::class, 'medicines'])->name('admin.medicines');
    Route::get('admin/medicines/add', [MedicinesController::class, 'add_medicines'])->name('admin.medicines.add');
    Route::post('admin/medicines/store', [MedicinesController::class, 'store'])->name('admin.medicines.store');
    Route::get('admin/medicines/edit/{id}', [MedicinesController::class, 'edit'])->name('admin.medicines.edit');
    Route::delete('admin/medicines/delete/{id}', [MedicinesController::class, 'destroy'])->name('admin.medicines.delete');
    Route::put('admin/medicines/update/{id}', [MedicinesController::class, 'update'])->name('admin.medicines.update');
    Route::get('admin/medicines/restore/{id}', [MedicinesController::class, 'restore'])->name('admin.medicines.restore');
    Route::delete('admin/medicines/force-delete/{id}', [MedicinesController::class, 'forceDelete'])->name('admin.medicines.forceDelete');

    // Display list of medicine stock
    Route::get('admin/medicines_stock', [MedicinesController::class, 'medicines_stock_list'])->name('admin.medicines_stock');
    Route::get('admin/medicines_stock/add', [MedicinesController::class, 'add_medicines_stock'])->name('admin.medicines_stock.add');
    Route::post('admin/medicines_stock', [MedicinesController::class, 'store_medicines_stock'])->name('admin.medicines_stock.store');
    Route::get('admin/medicines_stock/{id}/edit', [MedicinesController::class, 'edit_medicines_stock'])->name('admin.medicines_stock.edit');
    Route::put('admin/medicines_stock/{id}', [MedicinesController::class, 'update_medicines_stock'])->name('admin.medicines_stock.update');
    Route::delete('admin/medicines_stock/{id}', [MedicinesController::class, 'delete_medicines_stock'])->name('admin.medicines_stock.delete');

    //manage suppler
    Route::get('admin/suppliers', [SuppliersController::class, 'index'])->name('admin.suppliers.index');
    Route::get('admin/suppliers/add', [SuppliersController::class, 'create'])->name('admin.suppliers.create');
    Route::post('admin/suppliers', [SuppliersController::class, 'store'])->name('admin.suppliers.store');
    Route::get('admin/suppliers/{supplier}', [SuppliersController::class, 'show'])->name('admin.suppliers.show');
    Route::put('admin/suppliers/{supplier}', [SuppliersController::class, 'update'])->name('admin.suppliers.update');
    Route::delete('admin/suppliers/{supplier}', [SuppliersController::class, 'destroy'])->name('admin.suppliers.destroy');
    Route::get('admin/suppliers/{supplier}/edit', [SuppliersController::class, 'edit'])->name('admin.suppliers.edit');

    //Invoices
    Route::get('admin/invoices', [InvoicesController::class, 'index'])->name('admin.invoices.index');
    Route::get('admin/invoices/add', [InvoicesController::class, 'create'])->name('admin.invoices.add');
    Route::post('admin/invoices/store', [InvoicesController::class, 'store'])->name('admin.invoices.store');
    Route::get('admin/invoices/{id}/edit', [InvoicesController::class, 'edit'])->name('admin.invoices.edit');
    Route::put('admin/invoices/{id}', [InvoicesController::class, 'update'])->name('admin.invoices.update');
    Route::delete('admin/invoices/{id}', [InvoicesController::class, 'destroy'])->name('admin.invoices.delete');

    //Purchases
    Route::get('admin/purchases', [PurchasesController::class, 'index'])->name('admin.purchases.index');
    Route::get('admin/purchases/add', [PurchasesController::class, 'create'])->name('admin.purchases.add');
    Route::post('admin/purchases/store', [PurchasesController::class, 'store'])->name('admin.purchases.store');
    Route::get('admin/purchases/edit/{id}', [PurchasesController::class, 'edit'])->name('admin.purchases.edit');
    Route::put('admin/purchases/update/{id}', [PurchasesController::class, 'update'])->name('admin.purchases.update');
    Route::delete('admin/purchases/delete/{id}', [PurchasesController::class, 'destroy'])->name('admin.purchases.delete');

    //My Account
    Route::get('admin/my_account', [DashboardController::class, 'my_account'])->name('admin.my_account.my_account');
    Route::put('admin/my_account/update', [DashboardController::class, 'updateProfile'])->name('admin.my_account.update');




});

Route::post('logout', [AuthController::class, 'logout'])->name('logout');