<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::create(['title' => 'Pemrograman PHP', 'author' => 'Andi Prasetyo', 'year' => 2022, 'stock' => 6]);
        Book::create(['title' => 'Laravel untuk Pemula', 'author' => 'Budi Santoso', 'year' => 2023, 'stock' => 19]);
        Book::create(['title' => 'Basis Data', 'author' => 'Citra Dewi', 'year' => 2021, 'stock' => 7]);
        Book::create(['title' => 'Algoritma dan Pemrograman', 'author' => 'Dedi Setiawan', 'year' => 2020, 'stock' => 3]);
        Book::create(['title' => 'Pemrograman Berorientasi Objek', 'author' => 'Eko Prasetyo', 'year' => 2023, 'stock' => 8]);
       
    }
}
