@extends('layouts.app')

@section('title', 'Detail Buku')

@section('content')
    <h2>Detail Buku</h2>
    <p>Informasi detail untuk buku yang dipilih.</p>
    <hr>
    <p><strong>ID Buku:</strong> {{ $id }}</p>
@endsection