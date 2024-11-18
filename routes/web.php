<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BookController::class, 'index'])
    ->name('books.index');

Route::get('/create', [BookController::class, 'create'])
    ->name('books.create');

Route::post('/store', [BookController::class, 'salva'])
    ->name('books.store');

Route::get('/show/{book}', [BookController::class, 'show'])
    ->name('books.show');
