<?php

use App\Http\Controllers\Member\ComplaintSuggestionController;
use App\Http\Controllers\Member\DashboardController;
use App\Http\Controllers\Member\PointController;
use App\Http\Controllers\Member\EmployeeController;
use App\Http\Controllers\Member\PriceListController;
use App\Http\Controllers\Member\TransactionController;
use App\Http\Controllers\Member\VoucherController;

Route::get('/', [DashboardController::class, 'index'])->name('index');
Route::get('/price-lists', [PriceListController::class, 'index'])->name('price_lists.index');
Route::get('/points', [PointController::class, 'index'])->name('points.index');
Route::get('/vouchers/redeem/{voucher}', [VoucherController::class, 'store'])->name('vouchers.store');
Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
Route::get('/transactions/{transaction}', [TransactionController::class, 'show'])->name('transactions.show');
Route::get('/complaint-suggestions', [ComplaintSuggestionController::class, 'index'])->name('complaints.index');
Route::post('/complaint-suggestions', [ComplaintSuggestionController::class, 'store'])->name('complaints.store');

//
Route::get('/pelanggan',[EmployeeController::class, 'index'])->name('datapelanggan.index');
Route::get('/tambahpelanggan',[EmployeeController::class, 'tambahpelanggan'])->name('tambahpelanggan');

// Route::get('/tambahpelanggan',[EmployeeController::class, 'tambahpelanggan'])->name('tambahpelanggan');
Route::post('/insertdata',[EmployeeController::class, 'insertdata'])->name('insertdata');

Route::get('/tampilkandata/{id}',[EmployeeController::class, 'tampilkandata'])->name('tampilkandata');
Route::post('/updatedata/{id}',[EmployeeController::class, 'updatedata'])->name('updatedata');

Route::get('/delete/{id}',[EmployeeController::class, 'delete'])->name('delete');