@extends('layouts.main')

@section('title', 'Katalog Buku')

@section('content')
    <section aria-labelledby="judul-katalog">
        <h1 id="judul-katalog" class="text-2xl font-bold mb-4">Katalog Buku</h1>

        <form method="GET" action="{{ route('books.index') }}" role="search" class="flex gap-2 mb-6">
            <label for="q" class="sr-only">Cari buku</label>
            <input type="search" id="q" name="q" value="{{ request('q') }}"
                   placeholder="Cari judul atau penulis..."
                   class="flex-1 border border-gray-300 rounded px-3 py-2">
            <button type="submit" class="bg-indigo-700 text-white px-4 py-2 rounded hover:bg-indigo-800">Cari</button>
        </form>

        @if ($books->isEmpty())
            <p class="text-gray-600">Buku tidak ditemukan.</p>
        @else
            <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($books as $book)
                    <article class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm">
                        <h2 class="text-lg font-semibold">{{ $book->title }}</h2>
                        <p class="text-sm text-gray-600">
                            {{ $book->author }}@if ($book->year) ({{ $book->year }})@endif
                        </p>
                        <p class="mt-2 text-sm">Stok: <strong>{{ $book->stock }}</strong></p>
                        <a href="{{ route('books.show', $book) }}" class="inline-block mt-3 text-indigo-700 hover:underline">Lihat detail</a>
                    </article>
                @endforeach
            </div>
        @endif
    </section>
@endsection