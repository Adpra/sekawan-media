<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ManagerController;
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

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('showlogin');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('cms')
    ->name('cms.')
    ->middleware('auth')
    ->group(function () {

        Route::resource('/home', HomeController::class);
        Route::resource('manager', ManagerController::class)->middleware('access.manager');
        Route::resource('admin', AdminController::class)->middleware('access.admin');
    });
