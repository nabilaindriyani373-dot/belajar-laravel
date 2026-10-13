@extends('layouts.app')

@section('title', $title)

@section('content')
    <a href="{{ route('books.index') }}">Daftar Buku</a>

    <ul>
        <h3>{{ $book->title }}</h3>
        <p>Penulis: {{ $book->author }}</p>
        <p>Tahun: {{ $book->year }}</p>
        <p>Stok: {{ $book->stock }}</p>
        </ul>
@endsection