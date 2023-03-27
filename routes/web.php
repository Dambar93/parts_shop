<?php

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
    return view('welcome');
});
//Route::post('login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::post('auth', [\App\Http\Controllers\AuthController::class, 'auth'])->name('auth');
Route::middleware([\App\Http\Middleware\RoleMiddleware::class . ':' . \App\Models\User::ROLE_ADMIN])->group(function () {
    Route::get('/check', function () {
        return view('logined');
    });
});

Route::get('/checked', function () {
    return view('welcome');
})->name('login');