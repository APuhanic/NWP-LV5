<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\LanguageController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/teacher/dashboard', [TeacherController::class, 'dashboard'])->name('teacher.dashboard');
    Route::get('/student/dashboard', [StudentController::class, 'dashboard'])->name('student.dashboard');

});

Route::post('/assign-roles', [AdminController::class, 'assignRole'])->name('assign.roles');
Route::post('/tasks', [TeacherController::class, 'store'])->name('task.store');
Route::get('/change-language/{locale}', [LanguageController::class, 'changeLanguage'])->name('change-language');
Route::post('/change-language/{locale}', [LanguageController::class, 'changeLanguage'])->name('change-language');
Route::post('/tasks', [TeacherController::class, 'store'])->name('task.store');

require __DIR__.'/auth.php';
