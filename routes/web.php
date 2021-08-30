<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

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

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::post('/', [HomeController::class, 'store'])->name('home.store');

Route::get('redirect/{link}', [AdminController::class, 'redirect'])->name('admin.redirect');
Route::get('admin', [AdminController::class, 'index'])->name('admin.index');
Route::delete('admin/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
