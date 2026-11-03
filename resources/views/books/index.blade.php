@extends('layouts.app')

@section('title', $title)

@section('content')
    {{-- Notifikasi Sukses Login / Pesan lainnya --}}
    @if (session('Success'))
        <div style="padding: 10px 15px; background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; border-radius: 4px; margin-bottom: 15px; font-weight: bold;">
            {{ session('Success') }}
        </div>
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