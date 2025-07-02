<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Scripts -->
        <!-- <link rel="stylesheet" href="/css/app.css"> -->
        <!-- <script src="/js/app.js"></script> -->
    </head>
    <body class="font-sans antialiased">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
            <div class="container">
                <a class="navbar-brand" href="/">Kasir Cafe</a>
                @auth
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        @role('admin')
                            <li class="nav-item"><a class="nav-link" href="{{ route('categories.index') }}">Kategori</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('menus.index') }}">Menu</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('tables.index') }}">Meja</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('stocks.index') }}">Stok</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('expenses.index') }}">Pengeluaran</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('users.index') }}">User</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('transactions.index') }}">Transaksi</a></li>
                        @elserole('kasir')
                            <li class="nav-item"><a class="nav-link" href="{{ route('transactions.index') }}">Transaksi</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('expenses.index') }}">Pengeluaran</a></li>
                        @elserole('pemilik')
                            <li class="nav-item"><a class="nav-link" href="{{ route('expenses.index') }}">Laporan Pengeluaran</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('transactions.index') }}">Laporan Penjualan</a></li>
                        @endrole
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>
                                <li><form method="POST" action="{{ route('logout') }}">@csrf<button class="dropdown-item">Logout</button></form></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                @endauth
            </div>
        </nav>
        <div class="container mt-3">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            @yield('content')
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
