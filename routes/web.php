<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/search-book', [BookController::class, 'search'])->name('search.books');



Route::middleware('auth')->group(function () {
    Route::get('/book-add/{id}', [BookController::class, 'addBook'])->name('books.add');

    Route::get('/books-all', [BookController::class, 'getAllBooks'])->name('books.all');

    Route::get('/delete_book/{id}', [BookController::class, 'deleteBookById'])->name('delete.book');
});


require __DIR__ . '/auth.php';
