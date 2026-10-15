@extends('layouts.app')

@section('title', $title)

@section('content') 
    <form action="{{ route('books.store') }}" method="POST">
        @csrf

        <div>
            <label>Judul Buku</label>
            <input type="text" name="title" placeholder="Judul Buku" value="{{ old('title') }}">

            @error('title')
                <p>{{$message}}</p>
            @enderror

        </div>

        <div>
            <label>Penulis Buku</label>
            <input type="text" name="author" placeholder="Penulis" value="{{ old('author') }}">

            @error('author')
                <p>{{$message}}</p>
            @enderror

        </div>

        <div>
            <label>Tahun Terbit</label>
            <input type="number" name="year" placeholder="Tahun Terbit" value="{{ old('year') }}">

            @error('year')
                <p>{{$message}}</p>
            @enderror

        </div>

        <div>
            <label>Stok Buku</label>
            <input type="number" name="stock" placeholder="Stok Buku" value="{{ old('stock') }}">

            @error('stock')
                <p>{{$message}}</p>
            @enderror

        </div>

        <button type="submit">
            Tambah Buku
        </button>
    </form>
@endsection 