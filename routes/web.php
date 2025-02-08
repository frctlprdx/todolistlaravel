<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController; // Perbaiki namespace TaskController

// Halaman yang bisa diakses tanpa login
Route::view('/', 'welcome')->name('welcome');
Route::view('/register', 'auth.register')->name('register');
Route::view('/loginemail', 'auth.loginemail')->name('loginemail');
Route::view('/loginphone', 'auth.loginphone')->name('loginphone');

// Proses autentikasi
Route::post('/register', [UserController::class, 'register'])->name('register.process');
Route::post('/loginemail', [UserController::class, 'loginWithEmail'])->name('loginemail.process');
Route::post('/loginphone', [UserController::class, 'loginWithPhone'])->name('loginphone.process');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');


// Halaman yang hanya bisa diakses setelah login
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [TaskController::class, 'index'])->name('dashboard');
    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store'); // Menyimpan task
    Route::put('/tasks/{id}', [TaskController::class, 'update']);
    Route::delete('/tasks/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');
});