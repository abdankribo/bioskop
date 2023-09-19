<?php

use App\Http\Controllers\FilmController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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
Route::get('/register', [RegisterController::class, 'index'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::middleware('auth')->group(function () {
    Route::get('/film', [FilmController::class, 'index'])->middleware('is_admin');
    Route::get('/film/show', [FilmController::class, 'show'])->middleware('is_member');
    Route::get('/film/create', [FilmController::class, 'create'])->middleware('is_admin');
    Route::post('/film', [FilmController::class, 'store'])->middleware('is_admin');
    Route::get('/film/report', [FilmController::class, 'report'])->middleware('is_admin');
    Route::get('/film/print', [FilmController::class, 'print'])->middleware('is_admin');
    Route::get('/film/word', [FilmController::class, 'word'])->middleware('is_admin');
    Route::get('/film/{id}/edit', [FilmController::class, 'edit'])->middleware('is_admin');
    Route::put('/film/{id}', [FilmController::class, 'update'])->middleware('is_admin');
    Route::delete('/film/{id}', [FilmController::class, 'destroy'])->middleware('is_admin');
    Route::get('/film/{id}', [FilmController::class, 'order'])->middleware('is_member');

    Route::get('/film/show/action', [KategoriController::class, 'action'])->middleware('is_member');
    Route::get('/film/show/horror', [KategoriController::class, 'horror'])->middleware('is_member');
    Route::get('/film/show/romance', [KategoriController::class, 'romance'])->middleware('is_member');

});
