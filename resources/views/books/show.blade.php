@extends('layouts.main')

@section('title', $book->title)

@section('content')
    <article class="bg-white border border-gray-200 rounded-lg p-6 shadow-sm">
        <header class="mb-4">
            <h1 class="text-2xl font-bold">{{ $book->title }}</h1>
            <p class="text-gray-600">oleh {{ $book->author }}</p>
        </header>

        <dl class="grid grid-cols-2 gap-2 max-w-xs mb-4 text-sm">
            <dt class="font-semibold">Tahun</dt>
            <dd>{{ $book->year ?? '-' }}</dd>
            <dt class="font-semibold">Stok</dt>
            <dd>{{ $book->stock }}</dd>
        </dl>

        <section aria-labelledby="judul-deskripsi">
            <h2 id="judul-deskripsi" class="font-semibold mb-1">Deskripsi</h2>
            <p class="text-gray-700">{{ $book->description ?? 'Belum ada deskripsi.' }}</p>
        </section>

        <footer class="mt-6">
            @auth
                @if ($book->stock > 0)
                    <form method="POST" action="{{ route('loans.store', $book) }}" class="mb-4">
                        @csrf
                        <button type="submit" class="bg-indigo-700 text-white px-4 py-2 rounded hover:bg-indigo-800">Pinjam Buku</button>
                    </form>
                @else
                    <p class="mb-4 text-red-600">Stok habis.</p>
                @endif
            @else
                <p class="mb-4 text-sm text-gray-600">
                    <a href="{{ route('login') }}" class="text-indigo-700 hover:underline">Login</a> untuk meminjam buku ini.
                </p>
            @endauth

            <a href="{{ route('books.index') }}" class="text-indigo-700 hover:underline">&larr; Kembali ke katalog</a>
        </footer>
    </article>
@endsection