<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\AuthLoginController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ProfileController;
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

Route::prefix('admin')->group(function () {
    Route::middleware(['auth'])->group(function () {
        // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        Route::resource('users', UserController::class);
        Route::get('/users/view-change-password/{user}', [UserController::class, 'viewChangePassword'])->name('users.view-change-password');
        Route::post('/users/change-password/{user}', [UserController::class, 'changePassword'])->name('users.change-password');
    });
    require __DIR__.'/auth.php';
});
