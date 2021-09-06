<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TugasController;
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

Route::get('/', function () {
    return view('welcome');
});


// Route::resource('tugas', TugasController::class);
// Route::get('tugas/{id}','TugasController@status_pengerjaan');
// Route::get('tugas', [TugasController::class, 'index']);
// // Route::get('/tugas', [TugasController::class, 'create']);
// // Route::get('tugas', [TugasController::class, 'create']);
// Route::post('tugas', [TugasController::class, 'store']);

// Route::get('/tugas', 'TugasController@create');
// Route::post('/tugas', 'TugasController@store');
// Route::get('tugas/edit/{id}', [TugasController::class, 'edit']);
// Route::post('tugas/update', [TugasController::class, 'update']);
// Route::get('/show/{id}', [TugasController::class, 'show']);
// Route::post('tugas', [TugasController::class, 'update']);
Route::get('tugas/{id}', [TugasController::class, 'status_pengerjaan']);
Route::resource('tugas', TugasController::class);
// Route::get('tugas/{id}','TugasController@status_pengerjaan');
