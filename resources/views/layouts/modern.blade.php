<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Kasir Cafe')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Nunito', sans-serif; background: #f8fafc; }
        .navbar { box-shadow: 0 2px 8px rgba(0,0,0,0.04); }
        .card { border-radius: 1rem; box-shadow: 0 2px 8px rgba(0,0,0,0.06); }
        .table thead { background: #f1f3f6; }
        .btn-primary { background: #3b82f6; border: none; }
        .btn-primary:hover { background: #2563eb; }
        .form-control:focus { border-color: #3b82f6; box-shadow: 0 0 0 0.2rem rgba(59,130,246,.25); }
    </style>
    @stack('head')
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand fw-bold" href="/">Kasir Cafe</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @php
                    $user = Auth::user();
                @endphp
                @if($user)
                    @if($user->hasRole('admin'))
                        <li class="nav-item"><a class="nav-link" href="/dashboard">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link" href="/categories">Kategori</a></li>
                        <li class="nav-item"><a class="nav-link" href="/menus">Menu</a></li>
                        <li class="nav-item"><a class="nav-link" href="/tables">Meja</a></li>
                        <li class="nav-item"><a class="nav-link" href="/transactions">Transaksi</a></li>
                        <li class="nav-item"><a class="nav-link" href="/expenses">Pengeluaran</a></li>
                        <li class="nav-item"><a class="nav-link" href="/stocks">Stok</a></li>
                        <li class="nav-item"><a class="nav-link" href="/users">User</a></li>
                        <li class="nav-item"><a class="nav-link" href="/laporan">Laporan</a></li>
                    @elseif($user->hasRole('kasir'))
                        <li class="nav-item"><a class="nav-link" href="/dashboard">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link" href="/transactions">Transaksi</a></li>
                        <li class="nav-item"><a class="nav-link" href="/expenses">Pengeluaran</a></li>
                        <li class="nav-item"><a class="nav-link" href="/stocks">Stok</a></li>
                    @elseif($user->hasRole('pemilik'))
                        <li class="nav-item"><a class="nav-link" href="/dashboard">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link" href="/laporan">Laporan</a></li>
                    @endif
                @endif
            </ul>
            <ul class="navbar-nav">
                @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>
                        <li><form method="POST" action="{{ route('logout') }}">@csrf<button class="dropdown-item">Logout</button></form></li>
                    </ul>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
<div class="container mb-5">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    <h2 class="mb-4 fw-bold">@yield('title')</h2>
    @yield('content')
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>
