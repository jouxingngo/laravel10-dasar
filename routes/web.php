<?php

use App\Http\Controllers\ClassController;
use App\Http\Controllers\StudentController;
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
    return view('home', [
        "name" => "Joxing Ngo",
        "role" => "admin",
        "buahs" => ["pisang", "jeruk", "apel", "mangga"]
    ]);
});
Route::get('/students', [StudentController::class, 'index'])->name('students.index');
Route::get('/classes', [ClassController::class, 'index'])->name('classes.index');

Route::get('/students/export_excel', [StudentController::class, 'export_excel'])->name('students.export.excel');
