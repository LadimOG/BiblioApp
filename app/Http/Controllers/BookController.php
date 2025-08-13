<?php

namespace App\Http\Controllers;

use App\Services\GoogleBooksService;
use Illuminate\Http\Request;

class BookController extends Controller
{
    protected $googleBookService;

    public function __construct(GoogleBooksService $googleBookService)
    {
        $this->googleBookService = $googleBookService;
    }

    public function search(Request $request)
    {
        $query = $request->input('search');



        if ($query) {
            $books = $this->googleBookService->searchBooks($query);
            //dd($books);
            return view('bookFind', ['books' => $books]);
        }
        return view('bookFind');
    }

    public function addBook(string $id,)
    {
        if ($id) {
            $bookData = $this->googleBookService->getBookById($id);
        }
        dd($bookData);
    }
}
