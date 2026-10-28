@extends('layouts.app')

@section('title', $title)

@section('content')
    @if (session('Success'))
        <p>{{ session('Success') }}</p>
    @endif

    <a href="{{ route('books.create') }}">Tambah Buku</a>

    <ul>
        @foreach ($books as $book)
            <h3>{{ $book->title }} <small>({{ $book->category?->name ?? 'Belum ada kategori'}})</small></h3>
            <a href="{{ route('books.show', $book) }}">Detail Buku</a>
            <a href="{{ route('books.edit', $book) }}">Edit Buku</a>
            <form action="{{ route('books.destroy', $book) }}" method="POST" style="display: inline-block;"> 
                @csrf
                @method('DELETE')
                
                <button type="submit" onclick="return confirm ('Apakah yakin ingin menghapus buku ini')">
                    Hapus Buku
                </button>
            </form>
        @endforeach
    </ul>
@endsection