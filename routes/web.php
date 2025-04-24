<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;

// Welcome page
Route::get('/', fn() => view('welcome'));

// 🔐 Auth routes
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

// 🛡️ Admin Routes
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('register', [LoginController::class, 'showAdminRegistrationForm'])->name('register');
    Route::post('register', [LoginController::class, 'registerAdmin'])->name('store');
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
});

// 🎓 Student Routes
// 🎓 Student Routes
Route::middleware(['auth', 'role:student'])->prefix('student')->name('student.')->group(function () {
    Route::get('register', [LoginController::class, 'showStudentRegistrationForm'])->name('register');
    Route::post('register', [LoginController::class, 'registerStudent'])->name('store');

    // Student Dashboard
    Route::get('dashboard', [StudentController::class, 'index'])->name('dashboard');

    // Edit Profile
    Route::get('edit', [StudentController::class, 'edit'])->name('edit');
    Route::put('update', [StudentController::class, 'update'])->name('update');

    // View Classmate Details
    Route::get('classmate/{id}', [StudentController::class, 'show'])->name('classmate.show');
});

