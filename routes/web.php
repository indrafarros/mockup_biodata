<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
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
    return view('login');
});

Route::get('/', [AuthController::class, 'index'])->name('login.index');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'registerProcess'])->name('register.user');

Route::get('logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware('auth')->group(function () {

    Route::get('/profil', [UserController::class, 'profil'])->name('user.profil');


    Route::post('/update-profil', [UserController::class, 'store'])->name('user.update');
    Route::get('/user/get', [UserController::class, 'getDataProfile'])->name('user.get.profile');

    Route::middleware(['admin'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard.index');
        Route::get('/dashboard/user/{id}', [DashboardController::class, 'show'])->name('admin.user.view');
        Route::get('/dashboard/profile/destroy/{id}', [DashboardController::class, 'destroy'])->name('admin.dashboard.user.destroy');
    });
});
