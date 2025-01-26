<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FilterController;


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


Route::get('/categories/', [CategoryController::class, 'index']);
Route::get('/categories/{category}', [CategoryController::class, 'show']);

Route::get('/categories/{category}/edit/{filter}', [FilterController::class, 'edit']);
Route::get('/categories/{category}/new', [FilterController::class, 'create']);
Route::post('/categories/{category}/filters', [FilterController::class, 'store']);
Route::put('/filters/{filter}', [FilterController::class, 'update']);
