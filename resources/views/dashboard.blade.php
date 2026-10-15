@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
    <section aria-labelledby="judul-dashboard">
        <h1 id="judul-dashboard" class="text-2xl font-bold mb-2">Dashboard</h1>
        <p class="text-gray-600 mb-6">
            Halo, <strong>{{ auth()->user()->name }}</strong>!
            Kamu login sebagai <strong>{{ auth()->user()->role }}</strong>.
        </p>

        <nav aria-label="Menu dashboard">
            <ul class="grid gap-4 sm:grid-cols-2">
                <li>
                    <a href="{{ route('books.index') }}" class="block bg-white border border-gray-200 rounded-lg p-4 shadow-sm hover:border-indigo-700">
                        <h2 class="font-semibold">Katalog Buku</h2>
                        <p class="text-sm text-gray-600">Cari dan pinjam buku.</p>
                    </a>
                </li>
                <li>
                    <a href="{{ route('loans.index') }}" class="block bg-white border border-gray-200 rounded-lg p-4 shadow-sm hover:border-indigo-700">
                        <h2 class="font-semibold">Riwayat Peminjaman</h2>
                        <p class="text-sm text-gray-600">Lihat buku yang pernah kamu pinjam.</p>
                    </a>
                </li>
            </ul>
        </nav>
    </section>
@endsection