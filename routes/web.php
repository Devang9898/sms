<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Auth\RegisterController;


Route::get('/', function () {
    return view('welcome');
});


// Registration and login routes
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
// Route::get('register', [LoginController::class, 'showRegistrationForm'])->name('register');
// Route::post('register', [LoginController::class, 'register']);
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);



// Show admin registration form
Route::get('/register/admin', [RegisterController::class, 'showAdminRegistrationForm'])->name('auth.admin_register');

// Handle admin registration submission
Route::post('/register/admin', [RegisterController::class, 'registerAdmin'])->name('auth.admin_register.submit');
// Route for showing the student registration form
Route::get('register/student', [RegisterController::class, 'showStudentRegistrationForm'])->name('auth.student_register');

// Route for handling the student registration form submission
Route::post('register/student', [RegisterController::class, 'registerStudent'])->name('auth.student_register.submit');
// Admin registration route
Route::get('admin/register', [AdminController::class, 'showRegistrationForm'])->name('admin.register');
Route::post('admin/register', [AdminController::class, 'store'])->name('admin.store');

// Student registration route
Route::get('student/register', [StudentController::class, 'showRegistrationForm'])->name('student.register');
Route::post('student/register', [StudentController::class, 'store'])->name('student.store');

// Admin and student dashboards (as placeholders)
Route::get('admin/dashboard', function() {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::get('student/dashboard', function() {
    return view('student.dashboard');
})->name('student.dashboard');
Route::get('admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::get('student/dashboard', function () {
    return view('student.dashboard');
})->name('student.dashboard');


// // Route to show the admin registration form
// Route::get('admin/register', [LoginController::class, 'showAdminRegistrationForm'])->name('admin.register');

// // Route to show the student registration form
// Route::get('student/register', [LoginController::class, 'showStudentRegistrationForm'])->name('student.register');

// // Handle form submissions for admin registration
// Route::post('admin/register', [LoginController::class, 'submitAdminRegistration'])->name('admin.register.submit');

// // Handle form submissions for student registration
// Route::post('student/register', [LoginController::class, 'submitStudentRegistration'])->name('student.register.submit');
// Show admin registration form
Route::get('admin/register', [AdminController::class, 'showRegistrationForm'])->name('admin.register');

// Handle admin registration form submission
Route::post('admin/register', [AdminController::class, 'submitAdminRegistration'])->name('admin.register.submit');
// Show student registration form
Route::get('student/register', [StudentController::class, 'showRegistrationForm'])->name('student.register');

// Handle student registration submission
Route::post('student/register', [StudentController::class, 'submitStudentRegistration'])->name('student.register.submit');
// use App\Http\Controllers\Auth\RegisterController;

// // Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
// // Route::post('register', [RegisterController::class, 'register']);
