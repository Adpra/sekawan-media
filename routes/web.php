<?php

use App\Http\Controllers\AdminController;
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
    return view('home');
});

// Route::get('/', function () {
//     // return redirect()->route('login');
//     return redirect()->route('login-option');
// });


Route::prefix('cms')
    ->name('cms.')
    // ->middleware('auth')
    ->group(function () {

        Route::resource('admin', AdminController::class);

        Route::resource('manager', ManagerController::class);
    });
