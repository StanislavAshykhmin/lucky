<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\AccessController;
use App\Http\Controllers\User\GameController;
use App\Http\Controllers\User\HistoryController;
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

Route::prefix('{user:uuid}')->middleware(['limited_access'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('renew', [AccessController::class, 'renew'])->name('renew');
    Route::post('deactivate', [AccessController::class, 'deactivate'])->name('deactivate');
    Route::post('games', [GameController::class, 'store'])->name('games.store');
    Route::post('history', [HistoryController::class, 'latestGames'])->name('history.latest');
});
