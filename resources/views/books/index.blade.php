@extends('layouts.app')

@section('title', 'Daftar Buku')

@section('content')
    <h2>Daftar Buku Perpustakaan</h2>
    <p>Berikut adalah koleksi buku yang tersedia di sistem.</p>

     <ul> 
        @foreach($books as $book)
        <li>
                <h3>ID: {{ $book->id }}</h3>
                <h3>{{ $book->title }}</h3> 
                <p> Penulis: {{ $book->author }} </p>
                <p> Tahun: {{ $book->year }} </p>
                <p> Stok: {{ $book->stock}}
        </li>
        @endforeach
    </ul>

    @if($stock > 0)
        <p><strong>Status:</strong> Buku tersedia (Stok: {{ $stock }})</p>
    @else
        <p><strong>Status:</strong> Buku sedang habis.</p>
    @endif

    <hr>

   
@endsection