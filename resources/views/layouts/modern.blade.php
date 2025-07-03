<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Kasir Cafe')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background: linear-gradient(135deg, #f8fafc 0%, #e0e7ff 100%);
            min-height: 100vh;
        }
        .navbar {
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
            background: linear-gradient(90deg, #3b82f6 0%, #6366f1 100%) !important;
        }
        .navbar-brand {
            color: #fff !important;
            letter-spacing: 2px;
            font-size: 1.5rem;
        }
        .navbar-nav .nav-link {
            color: #e0e7ff !important;
            font-weight: 600;
            margin-right: 0.5rem;
            transition: color 0.2s;
        }
        .navbar-nav .nav-link.active, .navbar-nav .nav-link:hover {
            color: #fbbf24 !important;
        }
        .container {
            max-width: 100% !important;
            padding-left: 2vw;
            padding-right: 2vw;
        }
        .card, .table, .alert, .form-control, .dropdown-menu {
            box-shadow: 0 4px 24px rgba(59,130,246,0.10), 0 1.5px 6px rgba(99,102,241,0.08);
        }
        .card {
            background: linear-gradient(135deg, #fff 80%, #e0e7ff 100%);
            border-radius: 1.5rem;
            padding: 2rem 1.5rem;
            margin-bottom: 2rem;
        }
        .table {
            background: #fff;
            border-radius: 1rem;
            overflow: hidden;
        }
        .table thead {
            font-size: 1.1rem;
            letter-spacing: 1px;
        }
        .table td, .table th {
            vertical-align: middle;
        }
        .form-control {
            border-radius: 0.75rem;
            background: #f1f5f9;
        }
        .dropdown-menu {
            min-width: 180px;
        }
        .btn, .form-control {
            box-shadow: 0 2px 8px rgba(99,102,241,0.07);
        }
        .btn {
            border-radius: 0.75rem;
            padding: 0.5rem 1.25rem;
        }
        .alert {
            border-radius: 0.75rem;
            font-size: 1.05rem;
        }
        @media (max-width: 768px) {
            .container {
                padding-left: 0.5rem;
                padding-right: 0.5rem;
            }
            .card {
                padding: 1rem 0.5rem;
            }
        }
        h2, h1 {
            color: #3b82f6;
            font-weight: 800;
            letter-spacing: 1px;
        }
        .dropdown-item:hover {
            background: #6366f1;
            color: #fff;
        }
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
