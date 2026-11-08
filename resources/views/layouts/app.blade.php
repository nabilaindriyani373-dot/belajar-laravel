<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">

    <title>
        @yield('title')
    </title>    
</head>
<body>
    <header>
        <h1>Library System</h1>

        <nav>
            <a href="{{ route('books.index') }}">Books</a> 
            <a href='/categories'>Categories</a>
            <a href='/members'>Members</a>
           <a href='/dasboard'>Dasboard</a>
            <a href="{{ route('books.index') }}">Kelola Buku</a>

            @can('manage-users')
                <a href="{{ route('users.index') }}">
                Kelola Pengguna
                </a>
            @endcan

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </nav>

        <hr>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <hr>
        <p>Library System</p>
    </footer>
</body>
</html>