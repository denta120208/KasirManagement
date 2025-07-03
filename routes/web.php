<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    // Admin
    Route::resource('categories', CategoryController::class)->middleware('role:admin');
    Route::resource('menus', MenuController::class)->middleware('role:admin');
    Route::resource('tables', TableController::class)->middleware('role:admin');
    Route::resource('stocks', StockController::class)->middleware('role:admin|kasir');
    Route::resource('users', UserController::class)->middleware('role:admin');
    // Pengeluaran
    Route::resource('expenses', ExpenseController::class)->middleware('role:admin|kasir|pemilik');
    Route::get('expenses-export-excel', [ExpenseController::class, 'exportExcel'])->name('expenses.exportExcel');
    // Transaksi
    Route::resource('transactions', TransactionController::class)->middleware('role:admin|kasir|pemilik');
    Route::get('transactions-export-excel', [TransactionController::class, 'exportExcel'])->name('transactions.exportExcel');
    // Laporan
    Route::get('laporan', function() { return view('laporan.index'); })->name('laporan.index');
    // Export User
    Route::get('users-export-excel', [UserController::class, 'exportExcel'])->name('users.exportExcel');
    Route::get('menus-export-excel', [MenuController::class, 'exportExcel'])->name('menus.exportExcel')->middleware('role:admin|kasir|pemilik');
    Route::get('categories-export-excel', [CategoryController::class, 'exportExcel'])->name('categories.exportExcel')->middleware('role:admin|kasir|pemilik');
    Route::get('tables-export-excel', [TableController::class, 'exportExcel'])->name('tables.exportExcel')->middleware('role:admin|kasir|pemilik');
    Route::get('stocks-export-excel', [StockController::class, 'exportExcel'])->name('stocks.exportExcel')->middleware('role:admin|kasir|pemilik');
});

require __DIR__.'/auth.php';
