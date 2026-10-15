@extends('layouts.main')

@section('title', 'Kelola Buku')

@section('content')
    <section aria-labelledby="judul-kelola">
        <header class="flex items-center justify-between mb-4">
            <h1 id="judul-kelola" class="text-2xl font-bold">Kelola Buku</h1>
            <a href="{{ route('admin.books.create') }}" class="bg-indigo-700 text-white px-4 py-2 rounded hover:bg-indigo-800">+ Tambah Buku</a>
        </header>

        <div class="overflow-x-auto">
            <table class="w-full bg-white border border-gray-200 text-sm">
                <caption class="sr-only">Daftar semua buku</caption>
                <thead class="bg-gray-100 text-left">
                    <tr>
                        <th scope="col" class="px-3 py-2">Judul</th>
                        <th scope="col" class="px-3 py-2">Penulis</th>
                        <th scope="col" class="px-3 py-2">Tahun</th>
                        <th scope="col" class="px-3 py-2">Stok</th>
                        <th scope="col" class="px-3 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $book)
                        <tr class="border-t border-gray-200">
                            <td class="px-3 py-2">{{ $book->title }}</td>
                            <td class="px-3 py-2">{{ $book->author }}</td>
                            <td class="px-3 py-2">{{ $book->year ?? '-' }}</td>
                            <td class="px-3 py-2">{{ $book->stock }}</td>
                            <td class="px-3 py-2">
                                <div class="flex items-center gap-3">
                                    <a href="{{ route('admin.books.edit', $book) }}" class="text-indigo-700 hover:underline">Edit</a>
                                    <form method="POST" action="{{ route('admin.books.destroy', $book) }}"
                                          onsubmit="return confirm('Hapus buku ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection