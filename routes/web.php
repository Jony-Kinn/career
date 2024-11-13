<?php

// routes/web.php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\InstituteController;
use App\Http\Controllers\StudentController;

Route::middleware(['auth'])->group(function () {
    // Admin Routes
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
    Route::post('/admin/institution', [AdminController::class, 'addInstitution']);

    // Institute Routes
    Route::get('/institute/dashboard', [InstituteController::class, 'dashboard']);
    Route::post('/institute/faculty', [InstituteController::class, 'addFaculty']);

    // Student Routes
  // routes/web.php



Route::middleware(['auth', 'role:student'])->group(function () {
    Route::get('/student/dashboard', [StudentController::class, 'dashboard'])->name('student.dashboard');
    Route::post('/student/apply', [StudentController::class, 'apply'])->name('student.apply');
    Route::get('/student/profile', [StudentController::class, 'profile'])->name('student.profile');
    Route::put('/student/profile', [StudentController::class, 'updateProfile'])->name('student.updateProfile');
});
});

Route::prefix('admin')->group(function () {
    Route::resource('users', AdminController::class);
});

Route::resource('institutes', InstituteController::class);
Route::resource('students', StudentController::class);
