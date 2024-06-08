<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\LabelController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\TaskController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Http\Request;
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
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('departments', DepartmentController::class);
        Route::resource('roles', RoleController::class);
        Route::resource('labels', LabelController::class);
        Route::resource('permissions', PermissionController::class);

        Route::resource('users', UserController::class);
        Route::get('/users/view-change-password/{user}', [UserController::class, 'viewChangePassword'])->name('users.view-change-password');
        Route::post('/users/change-password/{user}', [UserController::class, 'changePassword'])->name('users.change-password');
        Route::get('/users/get-user-list-by-department/{id}', [UserController::class, 'getUserListByDepartment'])->name('users.get-user-list-by-department');

        Route::resource('tasks', TaskController::class);
        Route::post('/tasks/comment/{id}', [TaskController::class, 'comment'])->name('tasks.comment');
    });
    require __DIR__.'/auth.php';
});

Route::get('{any}', function (Request $request) {
    if (view()->exists($request->path())) {
        return view($request->path());
    }

    return abort(404);
});
