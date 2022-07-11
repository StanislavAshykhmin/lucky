<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\Admin\LoginController;

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

Route::redirect('/', 'register');

Auth::routes([
    'verify' => false,
    'reset' => false,
    'confirm' => false,
]);

Route::prefix('admin')->name('admin.')->group(function () {
    Route::prefix('login')->name('login.')->group(function () {
        Route::get('/', [LoginController::class, 'showLoginForm'])->name('get');
        Route::post('/', [LoginController::class, 'login'])->name('post');
    });
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});
