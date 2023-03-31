<?php

use App\Http\Controllers\UserAuthController;
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
})->name('home.laravel');

Route::get('/Logout', [UserAuthController::class, 'logout'])->name('logout');

Route::middleware('alreadyloggedin')->group(function () {
    Route::post('/register-user', [UserAuthController::class, 'store'])->name('user.ajouter.register');
    Route::post('/register-user', [UserAuthController::class, 'store'])->name('user.ajouter.register');
    Route::post('login-user', [UserAuthController::class, 'login'])->name('user.login.sign.in');
    Route::get('login', [UserAuthController::class, 'index'])->name('user.login');
    Route::get('/register', [UserAuthController::class, 'register'])->name('user.register');
});

Route::middleware('prevent-back-history')->group(function () {
    Route::middleware('isLogged')->group(function () {
        Route::get('menu', [UserAuthController::class, 'dash'])->name('home.dash');
        Route::get('profile', [UserAuthController::class, 'profile'])->name('user.profile');
        Route::put('profile_user/{user}', [UserAuthController::class, 'update'])->name('update.profile');
        Route::put('profile/{user}', [UserAuthController::class, 'Update_Password'])->name('password.Update');
        Route::delete('profile/{user}', [UserAuthController::class, 'destroy'])->name('user.delete');
    });
});


