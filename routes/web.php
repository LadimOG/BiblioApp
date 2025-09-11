<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowingController;
use App\Http\Controllers\UserController;
use App\Models\Borrowing;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/search-book', [BookController::class, 'index'])->name('index.books');



Route::middleware('auth')->group(function () {
    Route::post('/book-store', [BookController::class, 'store'])->name('book.store');

    Route::get('/livres', [BookController::class, 'showBooks'])->name('books.all');

    Route::get('/delete_book/{id}', [BookController::class, 'deleteBookById'])->name('delete.book');

    Route::get('/emprunt', [BorrowingController::class, 'create'])->name('emprunt.form');

    Route::post('/emprunt', [BorrowingController::class, 'store'])->name('emprunt.store');
});


require __DIR__ . '/auth.php';
