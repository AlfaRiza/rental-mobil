<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransactionController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware(['auth'])->name('dashboard');

// Route::get('/profile', )
Route::middleware(['auth'])->resource('/car', CarController::class);
Route::middleware(['auth'])->resource('/user', UserController::class);
Route::post('transaction/{transaction:id}/status', [TransactionController::class, 'status'])->name('transaction.status');
Route::middleware(['auth'])->resource('/transaction', TransactionController::class);

require __DIR__.'/auth.php';
