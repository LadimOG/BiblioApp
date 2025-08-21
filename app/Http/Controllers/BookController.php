<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Services\GoogleBooksService;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

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
            return view('bookFind', compact('books', 'query'));
        }
        return redirect()->route('home');
    }

    public function addBook(string $id): RedirectResponse
    {

        $bookExisting = Book::where('google_books_id', $id)->exists();

        if ($bookExisting) {
            return redirect()->route('home')->with('error', 'Ce livre est présent dans votre collection !');
        }

        try {
            $bookData = $this->googleBookService->getBookById($id);
        } catch (RequestException $e) {
            return redirect()->route('home')->with('error', 'Impossible');
        }

        $book = Book::create([
            'title' => $bookData['volumeInfo']['title'] ?? 'Titre inconnu',
            'author' => implode(', ', $bookData['volumeInfo']['authors'] ?? []),
            'published_year' => substr($bookData['volumeInfo']['publishedDate'] ?? 'N/A', 0, 4),
            'description' => strip_tags($bookData['volumeInfo']['description'] ?? null),
            'image_url' => $bookData['volumeInfo']['imageLinks']['smallThumbnail'] ?? null,
            'google_books_id' => $bookData['id']
        ]);

        return redirect()->route('home')->with('success', 'Livre ajouté avec succès !');
    }

    public function getAllBooks()
    {
        $books = Book::all();
        return view('books_bibliotheque', compact('books'));
    }

    public function deleteBookById(string $id)
    {
        $book = Book::findOrFail($id);

        $book->delete();

        return redirect()->route('books.all');
    }
}
