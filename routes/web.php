<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/book', [BookController::class, 'search'])->name('book');

Route::get('/book-add/{id}', [BookController::class, 'addBook'])->name('books.add');


require __DIR__ . '/auth.php';
