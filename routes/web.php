<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;

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
    return view('master');
});

Route::get('/list', [BooksController::class, 'index']);
Route::get('/show', [BooksController::class, 'show']);
Route::get('/create', [BooksController::class, 'create'])->name('create');
Route::get('/edit', [BooksController::class, 'edit']);