<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>@yield('title', $title)</title>
</head>

<body>
    <div class="container">
        <h1>@yield('title', $title)</h1>
        @yield('content')

        <!-- Tombol Logout -->
        @auth
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
        @endauth

        <!-- Navigasi ke Halaman Pembuatan Kontak -->
        @auth
        <a href="{{ route('contact.create') }}" class="btn btn-primary">Create Contact</a>
        @endauth
    </div>
</body>

</html>
