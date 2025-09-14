<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowing;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;

class BorrowingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $borrowings = Borrowing::with(['user', 'book'])->where('status', 'pending')->get();

        return view('emprunt_list', compact('borrowings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::select('id', 'name')->where('id', '!=', Auth::id())->get();

        $books = Book::all();

        return view('emprunt_form', compact('books', 'users',));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'book_id' => 'required|exists:books,id'

        ]);

        $book = Book::findOrFail($request->input('book_id'));

        if ($book->status === 'borrowed') {
            return redirect()->back()->withErrors(['error' => 'Livre déja emprunté']);
        }

        try {
            DB::transaction(function () use ($book, $request) {
                Borrowing::create([
                    'user_id' => $request->input('user_id'),
                    'book_id' => $book->id,
                    'borrowed_at' => now(),
                    'due_date' => now()->addMonth(),
                ]);
                $book->update(['status' => 'borrowed']);
            });

            return redirect()->back()->with('success', "L'emprunt à été pris en compte ");
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => "une erreur est survenue lors de l'enregistrement de l'emprunt"]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id' => 'required|exists:borrowings,id',
        ]);

        $borrowing = Borrowing::with('book')->findOrFail($id);

        try {
            DB::transaction(function () use ($borrowing) {
                $borrowing->update([
                    'status' => 'returned',
                    'returned_at' => now()
                ]);
                $borrowing->book->update([
                    'status' => 'available'
                ]);
            });
            return redirect()->back()->with('success', 'Le livre est rendu');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Problème de mise à jours du dépot de livre !']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
