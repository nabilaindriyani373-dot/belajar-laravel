<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Perpustakaan</title>
</head>
<body>
    <h1>Login Sistem Perpustakaan</h1>

    {{-- Menampilkan pesan error validasi --}}
    @if ($errors->any())
        <div>
            @foreach ($errors->all() as $error)
                <p style="color: red;">{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('login.submit') }}" method="POST">
        @csrf
        
        <table>
            <tr>
                <td><label for="email">Email</label></td>
                <td>:</td>
                <td>
                    <input 
                        type="email" 
                        name="email" 
                        id="email" 
                        value="{{ old('email') }}" 
                        style="width: 200px;"
                        required
                    >
                </td>
            </tr>
            <tr>
                <td><label for="password">Password</label></td>
                <td>:</td>
                <td>
                    <input 
                        type="password" 
                        name="password" 
                        id="password" 
                        style="width: 200px;"
                        required
                    >
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>
                    <button type="submit" style="margin-top: 5px;">Login</button>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>