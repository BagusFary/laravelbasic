<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ExtracurricularController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function() {
    return view('home');
})->middleware('auth');

Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticating']);
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');


Route::get('/students', [StudentController::class, 'index'])->middleware('auth');
Route::get('/student/{id}', [StudentController::class, 'show'])->middleware(['auth', 'admin-teacher']);
Route::get('/student-create', [StudentController::class, 'create'])->middleware(['auth', 'admin-teacher']);
Route::post('/student', [StudentController::class, 'store'])->middleware(['auth', 'admin-teacher']);
Route::get('/student-edit/{id}', [StudentController::class, 'edit'])->middleware(['auth', 'admin-teacher']);
Route::put('/student/{id}', [StudentController::class, 'update'])->middleware(['auth', 'admin-teacher']);
Route::get('/student-delete/{id}', [StudentController::class, 'delete'])->middleware(['auth', 'admin']);
Route::delete('/student-destroy/{id}', [StudentController::class, 'destroy'])->middleware(['auth', 'admin']);
Route::get('/student-delete-gambar/{id}', [StudentController::class, 'deleteGambar'])->middleware(['auth', 'admin']);
Route::delete('/student-destroy-gambar/{id}', [StudentController::class, 'destroyGambar'])->middleware(['auth', 'admin']);
Route::get('/student-deleted', [StudentController::class, 'deletedStudent'])->middleware(['auth', 'admin']);
Route::get('/student/{id}/recover', [StudentController::class, 'recoverStudent'])->middleware(['auth', 'admin']);
Route::get('/student/{id}/restored', [StudentController::class, 'restoredStudent'])->middleware(['auth', 'admin']);

Route::get('/class', [ClassController::class, 'index'])->middleware('auth');
Route::get('/class/{id}', [ClassController::class, 'show'])->middleware('auth');

Route::get('/extracurriculars', [ExtracurricularController::class, 'index'])->middleware('auth');
Route::get('/extracurriculars/{id}', [ExtracurricularController::class, 'show'])->middleware('auth');

Route::get('/teachers', [TeacherController::class, 'index'])->middleware('auth');
Route::get('/teacher/{id}', [TeacherController::class, 'show'])->middleware('auth');






