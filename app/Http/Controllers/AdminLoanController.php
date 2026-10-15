<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use Illuminate\Support\Facades\DB;

class AdminLoanController extends Controller
{
    public function index()
    {
        $loans = Loan::with(['user', 'book'])->latest()->get();

        return view('admin.loans.index', compact('loans'));
    }

    public function returnBook(Loan $loan)
    {
        if ($loan->returned_at) {
            return back()->with('error', 'Buku ini sudah dikembalikan.');
        }

        DB::transaction(function () use ($loan) {
            $loan->update(['returned_at' => now()->toDateString()]);
            $loan->book->increment('stock');
        });

        return back()->with('success', 'Buku ditandai sudah dikembalikan.');
    }
}