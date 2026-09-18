@extends('layouts.app')

@section('title', 'Daftar Buku')

@section('content')
    <h2>Daftar Buku Perpustakaan</h2>
    <p>Berikut adalah koleksi buku yang tersedia di sistem.</p>

    {{-- Simulasi Kondisi Stok Buku menggunakan @if --}}
    @if($stock > 0)
        <p><strong>Status:</strong> Buku tersedia (Stok: {{ $stock }})</p>
    @else
        <p><strong>Status:</strong> Buku sedang habis.</p>
    @endif

    <hr>

    <ul>
        @foreach($books as $book)
            <li>
                <strong>{{ $book['title'] }}</strong> 
                - Penulis: {{ $book['author'] }} 
                (Tahun: {{ $book['year'] }})
            </li>
        @endforeach
    </ul>
@endsection