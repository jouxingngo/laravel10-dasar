<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\ExtracurricularController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Models\Student;
use App\Models\Teacher;
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
    return view('home');
});

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'authtentication'])->name('login.auth');
});




Route::middleware(['auth'])->group(function () {
    Route::get('/students/export_excel', [StudentController::class, 'export_excel'])->name('students.export.excel');

    Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

    Route::get('/students', [StudentController::class, 'index'])->name('students.index');
    Route::get('/students/deleted', [StudentController::class, 'showDeleted'])->name('students.deleted');
    Route::post('/students', [StudentController::class, 'store'])->name('students.store');
    Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
    Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');
    Route::put('/students/{id}', [StudentController::class, 'update'])->name('students.update');
    Route::delete('/students/{id}/forceDelete', [StudentController::class, 'forceDelete'])->name('students.forceDelete');
    Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');
    Route::get('/students/{id}/restore', [StudentController::class, 'restore'])->name('students.restore');
    Route::get('/students/{id}', [StudentController::class, 'show'])->name('students.show');

    Route::get('/classes', [ClassController::class, 'index'])->name('classes.index');
    Route::get('/classes/create', [ClassController::class, 'create'])->name('classes.create');
    Route::post('/classes/store', [ClassController::class, 'store'])->name('classes.store');
    Route::get('/classes/{id}', [ClassController::class, 'show'])->name('classes.show');

    Route::get('/extracurriculars', [ExtracurricularController::class, 'index'])->name('extracurriculars.index');
    Route::get('/extracurriculars/create', [ExtracurricularController::class, 'create'])->name('extracurriculars.create');
    Route::post('/extracurriculars/store', [ExtracurricularController::class, 'store'])->name('extracurriculars.store');
    Route::get('/extracurriculars/{id}', [ExtracurricularController::class, 'show'])->name('extracurriculars.show');
    Route::get('/extracurriculars/students/create', [ExtracurricularController::class, 'studentEkskul'])->name('extracurriculars.student.create');
    Route::post('/extracurriculars/students/store', [ExtracurricularController::class, 'studentEkskulStore'])->name('extracurriculars.students.store');
    Route::delete('/extracurriculars/{ekskulId}/students/{studentId}', [ExtracurricularController::class, 'studentEkskulDestroy'])->name('extracurriculars.students.destroy');

    Route::get('/teachers', [TeacherController::class, 'index'])->name('teachers.index');
    Route::get('/teachers/create', [TeacherController::class, 'create'])->name('teachers.create');
    Route::post('/teachers/store', [TeacherController::class, 'store'])->name('teachers.store');
    Route::get('/teachers/{id}', [TeacherController::class, 'show'])->name('teachers.show');
});
