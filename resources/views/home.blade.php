@extends('layouts.main')

@section('title', 'Beranda')

@section('content')
    <section aria-labelledby="judul-hero" class="text-center py-10">
        <h1 id="judul-hero" class="text-3xl font-bold mb-3">Selamat Datang di Perpustakaan Online</h1>
        <p class="text-gray-600">Cari dan pinjam buku favoritmu dengan mudah.</p>
    </section>

    <section aria-labelledby="judul-cara" class="mt-8">
        <h2 id="judul-cara" class="text-xl font-semibold mb-3">Cara Meminjam Buku</h2>
        <ol class="list-decimal list-inside space-y-1 text-gray-700">
            <li>Daftar akun atau login sebagai member.</li>
            <li>Pilih buku yang ingin dipinjam dari katalog.</li>
            <li>Klik tombol Pinjam, lalu ambil bukunya di perpustakaan.</li>
        </ol>
    </section>
@endsection