<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\CategoryController;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/finances', [TransactionController::class, 'index'])->name('finances.index');
Route::put('/finances/{transaction}', [TransactionController::class, 'update'])->name('finances.update');
Route::delete('/transactions', [TransactionController::class, 'destroy'])->name('transactions.delete');

Route::post('/importCsv', [TransactionController::class, 'importCsv']);
Route::post('/categorize', [TransactionController::class, 'categorize']);


Route::get('/categories/index', [CategoryController::class, 'index']);
