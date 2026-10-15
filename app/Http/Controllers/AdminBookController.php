<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class AdminBookController extends Controller
{
    public function index()
    {
        $books = Book::orderBy('title')->get();

        return view('admin.books.index', compact('books'));
    }

    public function create()
    {
        return view('admin.books.create');
    }

    public function store(Request $request)
    {
        Book::create($this->validated($request));

        return redirect()->route('admin.books.index')
            ->with('success', 'Buku berhasil ditambahkan.');
    }

    public function edit(Book $book)
    {
        return view('admin.books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $book->update($this->validated($request));

        return redirect()->route('admin.books.index')
            ->with('success', 'Buku berhasil diperbarui.');
    }

    public function destroy(Book $book)
    {
        if ($book->loans()->whereNull('returned_at')->exists()) {
            return back()->with('error', 'Buku masih dipinjam, tidak bisa dihapus.');
        }

        $book->delete();

        return redirect()->route('admin.books.index')
            ->with('success', 'Buku berhasil dihapus.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'title'       => 'required|string|max:255',
            'author'      => 'required|string|max:255',
            'year'        => 'nullable|integer|min:1000|max:2100',
            'description' => 'nullable|string',
            'stock'       => 'required|integer|min:0',
        ]);
    }
}