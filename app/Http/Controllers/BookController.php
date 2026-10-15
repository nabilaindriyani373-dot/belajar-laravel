<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Daftar Buku';
        $books = Book::all();

        return view('books.index', compact('title', 'books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah Buku';
        return view('books.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'title'  => 'required|string|max:255|unique:books,title|different:author',
        'author' => 'required|string|max:255',
        'year'   => 'required|integer|min:1900|max:' . date('Y'),
        'stock'  => 'required|integer|min:0',
        ]);
        Book::create($validated);

        return redirect()
        ->route('books.index')
        ->with('Success', 'Data buku berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        $title = 'Detail Buku';

        return view('books.show', compact('title', 'book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $title = 'Edit Buku';
        return view('books.edit', compact('title', 'book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
        'title'  => 'required|string|max:255|unique:books,title,' . $book->id . '|different:author',
        'author' => 'required|string|max:255',
        'year'   => 'required|integer|min:1900|max:' . date('Y'),
        'stock'  => 'required|integer|min:0',
        ]);

        $book->update($validated);

        return redirect()
        ->route('books.index')
         ->with('Success', 'Data buku berhasil diperbarui.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index');
    }
}