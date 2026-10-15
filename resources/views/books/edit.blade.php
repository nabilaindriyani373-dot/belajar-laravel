@extends('layouts.app')

@section('title', $title)

@section('content') 
    <form action="{{ route('books.update', $book) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label>Judul Buku</label>
            <input type="text" name="title" placeholder="Judul Buku" value="{{ old('title', $book->title) }}">

            @error('title')
                <p>{{$message}}</p>
            @enderror

        </div>
        
        <div>
            <label>Penulis Buku</label>
            <input type="text" name="author" placeholder="Penulis" value="{{ old('author', $book->author) }}">

            @error('author')
                <p>{{$message}}</p>
            @enderror
        </div>

        <div>
            <label>Tahun Terbit</label>
            <input type="number" name="year" placeholder="Tahun Terbit" value="{{ old('year', $book->year) }}">

            @error('year')
                <p>{{$message}}</p>
            @enderror
        </div>

        <div>
            <label>Stok Buku</label>
            <input type="number" name="stock" placeholder="Stok Buku" value="{{ old('stock', $book->stock) }}">

            @error('stock')
                <p>{{$message}}</p>
            @enderror
        </div>

        <button type="submit">
            Update
        </button>
    </form>
@endsection