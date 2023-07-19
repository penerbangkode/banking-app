<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/open-account', [IndexController::class, 'openAccount'])->name('open-account');
Route::get('/city', [IndexController::class, 'city'])->name('city');
Route::get('/district', [IndexController::class, 'district'])->name('district');
Route::get('/village', [IndexController::class, 'village'])->name('village');


Route::prefix('customer')->group(function(){
    Route::post('/login', [AuthController::class, 'login'])->name('auth.customer-login');
    Route::post('/register', [AuthController::class, 'register'])->name('auth.customer-register');
    Route::get('/logout', [AuthController::class, 'logout'])->middleware(['auth:customer'])->name('auth.customer-logout');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth:customer'])->name('dashboard');
Route::get('/profile', [DashboardController::class, 'profile'])->middleware(['auth:customer'])->name('profile');
Route::get('/search-account', [DashboardController::class, 'searchAccount'])->middleware(['auth:customer'])->name('search.account');
Route::post('/transaction-submit', [TransactionController::class, 'submit'])->middleware(['auth:customer'])->name('transaction.submit');
Route::get('/transaction-history', [TransactionController::class, 'history'])->middleware(['auth:customer'])->name('transaction.history');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';
