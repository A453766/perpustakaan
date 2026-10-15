<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Loan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoanController extends Controller
{
    public function index(Request $request)
    {
        $loans = Loan::with('book')
            ->where('user_id', $request->user()->id)
            ->latest()
            ->get();

        return view('loans.index', compact('loans'));
    }

    public function store(Request $request, Book $book)
    {
        $userId = $request->user()->id;

        $masihDipinjam = Loan::where('user_id', $userId)
            ->where('book_id', $book->id)
            ->whereNull('returned_at')
            ->exists();

        if ($masihDipinjam) {
            return back()->with('error', 'Kamu masih meminjam buku ini.');
        }

        $berhasil = DB::transaction(function () use ($book, $userId) {
            $buku = Book::lockForUpdate()->find($book->id);

            if ($buku->stock < 1) {
                return false;
            }

            $buku->decrement('stock');

            Loan::create([
                'user_id'   => $userId,
                'book_id'   => $buku->id,
                'loan_date' => now()->toDateString(),
                'due_date'  => now()->addDays(7)->toDateString(),
            ]);

            return true;
        });

        if (! $berhasil) {
            return back()->with('error', 'Maaf, stok buku habis.');
        }

        return redirect()->route('loans.index')
            ->with('success', 'Buku berhasil dipinjam. Batas pengembalian 7 hari.');
    }
}