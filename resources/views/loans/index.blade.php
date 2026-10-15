@extends('layouts.main')

@section('title', 'Riwayat Peminjaman')

@section('content')
    <section aria-labelledby="judul-riwayat">
        <h1 id="judul-riwayat" class="text-2xl font-bold mb-4">Riwayat Peminjaman</h1>

        @if ($loans->isEmpty())
            <p class="text-gray-600">Kamu belum pernah meminjam buku.
                <a href="{{ route('books.index') }}" class="text-indigo-700 hover:underline">Lihat katalog</a>
            </p>
        @else
            <div class="overflow-x-auto">
                <table class="w-full bg-white border border-gray-200 text-sm">
                    <caption class="sr-only">Daftar buku yang pernah kamu pinjam</caption>
                    <thead class="bg-gray-100 text-left">
                        <tr>
                            <th scope="col" class="px-3 py-2">Judul</th>
                            <th scope="col" class="px-3 py-2">Tgl Pinjam</th>
                            <th scope="col" class="px-3 py-2">Batas Kembali</th>
                            <th scope="col" class="px-3 py-2">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($loans as $loan)
                            <tr class="border-t border-gray-200">
                                <td class="px-3 py-2">{{ $loan->book->title }}</td>
                                <td class="px-3 py-2">{{ $loan->loan_date }}</td>
                                <td class="px-3 py-2">{{ $loan->due_date }}</td>
                                <td class="px-3 py-2">
                                    @if ($loan->returned_at)
                                        <span class="text-green-700">Dikembalikan</span>
                                    @else
                                        <span class="text-orange-600">Dipinjam</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </section>
@endsection