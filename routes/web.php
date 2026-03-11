<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InwardOutwardController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewUserController;

Route::get('/', function () {
    return redirect('/login');
});
Route::get('/login', [App\Http\Controllers\UserController::class, 'login']);
Route::get('/register', [App\Http\Controllers\UserController::class, 'register'])->name('registerUser');
Route::post('/loginAttempt',[App\Http\Controllers\UserController::class, 'loginAttempt']);
Route::post('/register-user',[App\Http\Controllers\UserController::class,'registerAttempt']);

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('categories', CategoryController::class);
    Route::resource('users', NewUserController::class);
    Route::resource('materials', MaterialController::class);
    Route::get('get-materials/{id}', [MaterialController::class, 'getMaterials']);
    Route::get('inward/create',
        [InwardOutwardController::class,'create']
    )->name('inward.create');

    Route::post('inward/store',
        [InwardOutwardController::class,'store']
    )->name('inward.store');

    Route::get('/logout',[App\Http\Controllers\UserController::class,'logout']);
});