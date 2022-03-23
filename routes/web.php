<?php

use App\Http\Controllers\Backend\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ProfileController;

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
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

// User Management Routes
Route::prefix('users')->group(function () {
    Route::get('view', [UserController::class, 'index'])->name('user.view');
    Route::get('add', [UserController::class, 'create'])->name('user.create');
    Route::post('store', [UserController::class, 'store'])->name('user.store');
    Route::get('edit/{user}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('update/{user}', [UserController::class, 'update'])->name('user.update');
    Route::get('delete/{user}', [UserController::class, 'destroy'])->name('user.delete');
});

// User Profile and Change Password
Route::prefix('profile')->group(function () {
    Route::get('view', [ProfileController::class, 'index'])->name('profile.view');
    Route::get('edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('password/view', [ProfileController::class, 'passwordEdit'])->name('password.view');
    Route::post('password/update', [ProfileController::class, 'passwordUpdate'])->name('password.update');
});
