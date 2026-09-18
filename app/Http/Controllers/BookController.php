<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $title = 'Daftar Buku';
        
        $books = [
            ['title' => 'Pemrograman PHP', 'author' => 'Andi Prasetyo', 'year' => 2022],
            ['title' => 'Laravel untuk Pemula', 'author' => 'Budi Santoso', 'year' => 2023],
            ['title' => 'Basis Data', 'author' => 'Citra Dewi', 'year' => 2021],
            ['title' => 'Algoritma dan Pemrograman', 'author' => 'Dedi Setiawan', 'year' => 2020],
            ['title' => 'Pemrograman Berorientasi Objek', 'author' => 'Eko Prasetyo', 'year' => 2023],
        ];
        
        $stock = 5;

        return view('books.index', compact('title', 'books', 'stock'));
    }

    public function show($id)
    {

        return view('books.show', compact('id'));
    }
}