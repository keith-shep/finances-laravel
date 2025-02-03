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


Route::prefix('categories')->name('categories.')->group(function () {
    Route::get('/', [CategoryController::class, 'index']);
    Route::get('/{category}', [CategoryController::class, 'show'])->name('show');
    Route::get('/{category}/edit/{filter}', [FilterController::class, 'edit']);
    Route::get('/{category}/new', [FilterController::class, 'create']);
    Route::post('/{category}/filters', [FilterController::class, 'store']);
    Route::put('/{category}/filters/{filter}', [FilterController::class, 'update']);
    Route::delete('/{category}/filters/{filter}', [FilterController::class, 'destroy']);
});




