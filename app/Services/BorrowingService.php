<?php

namespace App\Services;

use App\Models\Book;
use App\Models\Borrowing;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;

class BorrowingService
{
    public function storeBorrowing($userId, $bookId): bool
    {
        $book = Book::findOrFail($bookId);

        if ($book->status === 'borrowed') {
            throw new Exception('Ce livre est déja emprunté');
        }

        DB::transaction(function () use ($book, $userId) {
            Borrowing::create([
                'user_id' => $userId,
                'book_id' => $book->id,
                'borrowed_at' => Carbon::now(),
                'due_date' => Carbon::now()->addMonth(),
                'returned_at' => ''
            ]);
            $book->update(['status' => 'borrowed']);
        });

        return true;
    }

    public function updateBorrowing($id): bool
    {
        $borrowing = Borrowing::with('book')->findOrFail($id);

        if ($borrowing->status === 'returned') {
            throw new Exception('Problème de mise à jours du dépot de livre !');
        }

        DB::transaction(function () use ($borrowing) {
            $borrowing->update([
                'status' => 'returned',
                'returned_at' => Carbon::now()
            ]);
            $borrowing->book->update([
                'status' => 'available'
            ]);
        });

        return true;
    }
}
