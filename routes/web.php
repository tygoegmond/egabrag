<?php

use App\Http\Controllers\Users\RoleController;
use App\Http\Controllers\Users\UserController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Users
    // Users\UserController
    Route::get('/users', [UserController::class, 'index'])->name('users.user.index');
    // Users\RoleController
    Route::get('/users/roles', [RoleController::class, 'index'])->name('users.role.index');
    Route::get('/users/roles/create', [RoleController::class, 'create'])->name('users.role.create');
    Route::post('/users/roles', [RoleController::class, 'store'])->name('users.role.store');
});
