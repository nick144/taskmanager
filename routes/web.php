<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserAuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
    // return Auth::check()
    //     ? redirect()->route('dashboard')
    //     : redirect()->route('login');
})->name('home');


// Guest routes (accessible without login)
Route::middleware('guest')->group(function () {
    
    Route::get('/signup', [UserAuthController::class, 'showSignupForm'])->name('signup.form');
    Route::get('/login', [UserAuthController::class, 'showLoginForm'])->name('login.form');

    Route::post('/register', [UserAuthController::class, 'register'])->name('register');
    Route::post('/login', [UserAuthController::class, 'login'])->name('login');
});

// Authenticated routes (optional example for logout)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return redirect()->route('tasks.index');
    })->name('dashboard');

    // Custom search route
    Route::get('tasks/search', [TaskController::class, 'search'])->name('tasks.search');
    Route::resource('tasks', TaskController::class);
    Route::resource('categories', CategoryController::class);
    Route::post('/logout', [UserAuthController::class, 'logout'])->name('logout');
});