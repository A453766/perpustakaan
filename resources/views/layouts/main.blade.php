<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Beranda') - Perpustakaan Online</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex flex-col bg-gray-50 text-gray-800">

    <header class="bg-indigo-700 text-white">
        <div class="max-w-5xl mx-auto px-4 py-4 flex items-center justify-between">
            <a href="{{ route('home') }}" class="text-xl font-bold">📚 Perpustakaan Online</a>

            <nav aria-label="Navigasi utama">
                <ul class="flex items-center gap-5">
                    <li><a href="{{ route('home') }}" class="hover:underline">Beranda</a></li>
                    <li><a href="{{ route('books.index') }}" class="hover:underline">Katalog</a></li>

                    @guest
                        <li><a href="{{ route('login') }}" class="hover:underline">Login</a></li>
                        <li><a href="{{ route('register') }}" class="hover:underline">Register</a></li>
                    @endguest

                    @auth
                    @if (auth()->user()->role === 'admin')
    <li><a href="{{ route('admin.books.index') }}" class="hover:underline">Kelola Buku</a></li>
    <li><a href="{{ route('admin.loans.index') }}" class="hover:underline">Peminjaman</a></li>
@endif
                    <li><a href="{{ route('loans.index') }}" class="hover:underline">Riwayat</a></li>
                        <li><a href="{{ route('dashboard') }}" class="hover:underline">Dashboard</a></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="hover:underline">Logout</button>
                            </form>
                        </li>
                    @endauth
                </ul>
            </nav>
        </div>
    </header>

    <main class="flex-1 w-full max-w-5xl mx-auto px-4 py-8">
        @if (session('success'))
    <div role="status" class="mb-4 rounded bg-green-100 text-green-800 px-4 py-3">{{ session('success') }}</div>
@endif
@if (session('error'))
    <div role="alert" class="mb-4 rounded bg-red-100 text-red-800 px-4 py-3">{{ session('error') }}</div>
@endif
        @yield('content')
    </main>

    <footer class="bg-gray-800 text-gray-300">
        <div class="max-w-5xl mx-auto px-4 py-6 text-center text-sm">
            <p>&copy; {{ date('Y') }} Perpustakaan Online. Project Akhir Laravel 12.</p>
        </div>
    </footer>

</body>
</html>