@extends('layouts.main')

@section('title', 'Edit Buku')

@section('content')
    <section aria-labelledby="judul-edit" class="max-w-xl">
        <h1 id="judul-edit" class="text-2xl font-bold mb-4">Edit Buku</h1>

        <form method="POST" action="{{ route('admin.books.update', $book) }}">
            @csrf
            @method('PUT')
            @include('admin.books._form')

            <div class="mt-6 flex items-center gap-4">
                <button type="submit" class="bg-indigo-700 text-white px-4 py-2 rounded hover:bg-indigo-800">Perbarui</button>
                <a href="{{ route('admin.books.index') }}" class="text-gray-600 hover:underline">Batal</a>
            </div>
        </form>
    </section>
@endsection