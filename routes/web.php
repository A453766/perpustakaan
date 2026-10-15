<?php
use App\Http\Controllers\AdminBookController;
use App\Http\Controllers\AdminLoanController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');
Route::get('/buku', [BookController::class, 'index'])->name('books.index');
Route::get('/buku/{book}', [BookController::class, 'show'])->name('books.show');
Route::middleware('auth')->group(function () {
    Route::post('/buku/{book}/pinjam', [LoanController::class, 'store'])->name('loans.store');
    Route::get('/riwayat', [LoanController::class, 'index'])->name('loans.index');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/buku', [AdminBookController::class, 'index'])->name('books.index');
    Route::get('/buku/tambah', [AdminBookController::class, 'create'])->name('books.create');
    Route::post('/buku', [AdminBookController::class, 'store'])->name('books.store');
    Route::get('/buku/{book}/edit', [AdminBookController::class, 'edit'])->name('books.edit');
    Route::put('/buku/{book}', [AdminBookController::class, 'update'])->name('books.update');
    Route::delete('/buku/{book}', [AdminBookController::class, 'destroy'])->name('books.destroy');

    Route::get('/peminjaman', [AdminLoanController::class, 'index'])->name('loans.index');
    Route::patch('/peminjaman/{loan}/kembali', [AdminLoanController::class, 'returnBook'])->name('loans.return');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
