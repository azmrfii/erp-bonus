<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\BonusController;
use App\Http\Controllers\DashboardController;
use App\Models\Bonus;
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

Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'processLogin'])->name('processLogin');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::group(['middleware' => ['auth']], function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    // update on prog
    Route::put('/profile.update', [AuthController::class, 'profileUpdate'])->name('profile.update');
    // bonus
    Route::get('/bonuses', [BonusController::class, 'index'])->name('bonuses.index');
    Route::get('/bonuses.create', [BonusController::class, 'create'])->name('bonuses.create');
    Route::post('/bonuses.create', [BonusController::class, 'store'])->name('bonuses.store');
    Route::get('/bonuses.show/{bonus}', [BonusController::class, 'show'])->name('bonuses.show');
});

Route::group(['middleware' => ['auth', 'role']], function() {
    Route::get('/bonuses.edit/{bonus}', [BonusController::class, 'edit'])->name('bonuses.edit');
    Route::post('/bonuses.update', [BonusController::class, 'update'])->name('bonuses.update');
    Route::post('/bonuses.destroy', [BonusController::class, 'destroy'])->name('bonuses.destroy');
    
    // Route::resource('bonuses', BonusController::class);
});