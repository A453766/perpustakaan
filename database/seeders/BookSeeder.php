<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        Book::create([
            'title' => 'Laskar Pelangi',
            'author' => 'Andrea Hirata',
            'year' => 2005,
            'description' => 'Novel tentang perjuangan anak-anak Belitung.',
            'stock' => 3,
        ]);

        Book::create([
            'title' => 'Bumi Manusia',
            'author' => 'Pramoedya Ananta Toer',
            'year' => 1980,
            'description' => 'Kisah Minke di masa kolonial Hindia Belanda.',
            'stock' => 2,
        ]);

        Book::create([
            'title' => 'Negeri 5 Menara',
            'author' => 'Ahmad Fuadi',
            'year' => 2009,
            'description' => 'Perjalanan enam santri mengejar mimpi.',
            'stock' => 4,
        ]);
    }
}