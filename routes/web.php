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

Route::get('/list', [BooksController::class, 'index'])->name('list');

Route::get('/create', [BooksController::class, 'create'])->name('create');
Route::post('/create', [BooksController::class, 'store'])->name('store-book');

Route::get('/show', [BooksController::class, 'show']);

Route::get('/edit/{id}', [BooksController::class, 'edit'])->name('edit-book');
Route::put('/edit/{id}', [BooksController::class, 'update'])->name('update-book');

Route::delete('/delete/{id}', [BooksController::class, 'delete'])->name('delete-book');