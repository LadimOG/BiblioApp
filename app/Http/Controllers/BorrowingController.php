<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowing;
use App\Models\User;
use App\Services\BorrowingService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;

class BorrowingController extends Controller
{

    protected $borrowingService;

    public function __construct(BorrowingService $borrowingService)
    {
        $this->borrowingService = $borrowingService;
    }

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

        try {
            $this->borrowingService->storeBorrowing($request->input('user_id'), $request->input('book_id'));

            return redirect()->back()->with('success', "l'emprunt a bien été pris en compte");
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
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

        try {
            $this->borrowingService->updateBorrowing($id);
            return redirect()->back()->with('success', 'Le livre est rendu');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
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
