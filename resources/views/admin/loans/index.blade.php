@extends('layouts.main')

@section('title', 'Kelola Peminjaman')

@section('content')
    <section aria-labelledby="judul-pinjam">
        <h1 id="judul-pinjam" class="text-2xl font-bold mb-4">Kelola Peminjaman</h1>

        @if ($loans->isEmpty())
            <p class="text-gray-600">Belum ada peminjaman.</p>
        @else
            <div class="overflow-x-auto">
                <table class="w-full bg-white border border-gray-200 text-sm">
                    <caption class="sr-only">Daftar semua peminjaman</caption>
                    <thead class="bg-gray-100 text-left">
                        <tr>
                            <th scope="col" class="px-3 py-2">Peminjam</th>
                            <th scope="col" class="px-3 py-2">Buku</th>
                            <th scope="col" class="px-3 py-2">Tgl Pinjam</th>
                            <th scope="col" class="px-3 py-2">Batas Kembali</th>
                            <th scope="col" class="px-3 py-2">Status</th>
                            <th scope="col" class="px-3 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($loans as $loan)
                            <tr class="border-t border-gray-200">
                                <td class="px-3 py-2">{{ $loan->user->name }}</td>
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
                                <td class="px-3 py-2">
                                    @unless ($loan->returned_at)
                                        <form method="POST" action="{{ route('admin.loans.return', $loan) }}">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="text-indigo-700 hover:underline">Tandai Dikembalikan</button>
                                        </form>
                                    @endunless
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </section>
@endsection