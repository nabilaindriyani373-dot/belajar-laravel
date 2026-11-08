<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Facades\Gate;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Otorisasi Policy untuk melihat daftar buku
        Gate::authorize('viewAny', Book::class);

        $title = 'Daftar Buku';
        $books = Book::with('category')->get();

        return view('books.index', compact('title', 'books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Otorisasi Policy untuk membuat buku
        Gate::authorize('create', Book::class);

        $title = 'Tambah Buku';
        $categories = Category::orderBy('name')->get();

        return view('books.create', compact('title', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Otorisasi Policy untuk membuat buku
        Gate::authorize('create', Book::class);

        $validated = $request->validate([
            'title'       => 'required|string|max:255|unique:books,title|different:author',
            'author'      => 'required|string|max:255',
            'year'        => ['required', 'integer', 'min:1900', 'max:' . date('Y')],
            'stock'       => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
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
        // Otorisasi Policy untuk detail buku
        Gate::authorize('view', $book);

        $title = 'Detail Buku';

        return view('books.show', compact('title', 'book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        // Otorisasi Policy untuk edit buku
        Gate::authorize('update', $book);

        $title = 'Edit Buku';
        $categories = Category::orderBy('name')->get();

        return view('books.edit', compact('title', 'book', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        // Otorisasi Policy untuk update buku
        Gate::authorize('update', $book);

        $validated = $request->validate([
            'title'       => 'required|string|max:255|unique:books,title,' . $book->id . '|different:author',
            'author'      => 'required|string|max:255',
            'year'        => ['required', 'integer', 'min:1900', 'max:' . date('Y')],
            'stock'       => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
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
        // Otorisasi Policy untuk hapus buku
        Gate::authorize('delete', $book);

        $book->delete();

        return redirect()
            ->route('books.index')
            ->with('Success', 'Buku berhasil dihapus.');
    }
}