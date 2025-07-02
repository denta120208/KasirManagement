@extends('layouts.modern')
@section('title', 'Dashboard')
@push('nav')
    @role('admin')
        <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a></li>
    @elserole('kasir')
        <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a></li>
    @elserole('pemilik')
        <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a></li>
    @endrole
@endpush
@section('content')
<div class="row g-4">
    @role('admin')
        <div class="col-md-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Manajemen User</h5>
                    <a href="{{ route('users.index') }}" class="btn btn-primary w-100">Kelola User</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Manajemen Kategori</h5>
                    <a href="{{ route('categories.index') }}" class="btn btn-primary w-100">Kelola Kategori</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Manajemen Menu</h5>
                    <a href="{{ route('menus.index') }}" class="btn btn-primary w-100">Kelola Menu</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Manajemen Meja</h5>
                    <a href="{{ route('tables.index') }}" class="btn btn-primary w-100">Kelola Meja</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Manajemen Stok</h5>
                    <a href="{{ route('stocks.index') }}" class="btn btn-primary w-100">Kelola Stok</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Manajemen Pengeluaran</h5>
                    <a href="{{ route('expenses.index') }}" class="btn btn-primary w-100">Kelola Pengeluaran</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Manajemen Transaksi</h5>
                    <a href="{{ route('transactions.index') }}" class="btn btn-primary w-100">Kelola Transaksi</a>
                </div>
            </div>
        </div>
    @endrole
    @role('kasir')
        <div class="col-md-6">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Transaksi</h5>
                    <a href="{{ route('transactions.index') }}" class="btn btn-primary w-100">Input & Riwayat Transaksi</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Pengeluaran</h5>
                    <a href="{{ route('expenses.index') }}" class="btn btn-primary w-100">Input Pengeluaran</a>
                </div>
            </div>
        </div>
    @endrole
    @role('pemilik')
        <div class="col-md-6">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Laporan Penjualan & Pengeluaran</h5>
                    <a href="{{ route('laporan.index') }}" class="btn btn-primary w-100">Lihat Laporan</a>
                </div>
            </div>
        </div>
    @endrole
</div>
@endsection
