@extends('layouts.app')

@section('title', 'Data Member')

@section('content')
    <h2>Daftar Anggota</h2>
    <p>Sistem Informasi Perpustakaan</p>
    
    <hr>

    <ul>
        @foreach($members as $member)
            <li>{{ $member }}</li>
        @endforeach
    </ul>
@endsection