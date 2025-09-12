<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowing;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class BorrowingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {


        $users = User::select('id', 'name')->where('id', '!=', Auth::id())->get();
        $statusBook = Borrowing::select('status')->first();
        $books = Book::all();

        return view('emprunt_form', compact('books', 'users', 'statusBook'));
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

        $book = Book::find($request->input('book_id'));

        if ($book->status === 'borrowed') {
            return redirect()->back()->withErrors(['error' => 'Livre déja emprunté']);
        }

        DB::transaction(function () use ($book, $request) {
            Borrowing::create([
                'user_id' => $request->input('user_id'),
                'book_id' => $book->id,
                'borrowed_at' => now(),
                'due_date' => now()->addMonth(),
            ]);
        });

        $book->update(['status' => 'borrowed']);

        return redirect()->back()->with('success', "L'emprunt à été pris en compte ");
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
