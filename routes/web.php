<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

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
    return view('home', [
        'name' => 'Bagus', 
        'role' => 'Admin',
        'buah' => ['jeruk', 'apel', 'mangga', 'anggur', 'alpukat']
    ]);
});

Route::get('/students', [StudentController::class, 'index']);

Route::get('/class', function() {
    return view('class');
});




