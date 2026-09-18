<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $appName = 'Library System';
        $description = 'Selamat datang di Sistem Informasi Perpustakaan Sederhana.';
        $totalBooks = 5;
        $totalMembers = 5;
        $totalCategories = 5;

        return view('dashboard.index', compact(
            'appName',
            'description',
            'totalBooks',
            'totalMembers',
            'totalCategories'
        ));
    }
}