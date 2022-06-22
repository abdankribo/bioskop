<?php

use App\Http\Controllers\FilmController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

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

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::middleware('auth')->group(function () {
    Route::get('/film', [FilmController::class, 'index'])->middleware('is_admin');
    Route::get('/film/show', [FilmController::class, 'show']);
    Route::get('/film/create', [FilmController::class, 'create'])->middleware('is_admin');
    Route::post('/film', [FilmController::class, 'store'])->middleware('is_admin');
    Route::get('/film/{id}/edit', [FilmController::class, 'edit'])->middleware('is_admin');
    Route::put('/film/{id}', [FilmController::class, 'update'])->middleware('is_admin');
    Route::delete('/film/{id}', [FilmController::class, 'destroy'])->middleware('is_admin');
    Route::get('/film/{id}', [FilmController::class, 'order']);
});
