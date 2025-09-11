<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowing;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

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

        $userConnect = Auth::id();
        $users = User::select('id', 'name')->where('id', '!=', $userConnect)->get();

        $books = Book::all();
        return view('emprunt_form', compact('books', 'users'));
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

        $userId = $request->input('user_id');
        $bookId = $request->input('book_id');

        $bookAvailable = Borrowing::where('book_id', $bookId)->first();

        if (isset($bookAvailable->book_id)) {
            return redirect()->back()->withErrors([
                'error' => "Ce livre est actuellement indisponible !"
            ]);
        }

        Borrowing::create([
            'user_id' => $userId,
            'book_id' => $bookId,
            'borrowed_at' => now(),
            'due_date' => now()->addMonth(),
        ]);

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
