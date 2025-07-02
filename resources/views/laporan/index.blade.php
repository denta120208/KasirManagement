@extends('layouts.modern')
@section('title', 'Laporan Penjualan & Pengeluaran')
@push('nav')
    <li class="nav-item"><a class="nav-link active" href="{{ route('laporan.index') }}">Laporan</a></li>
@endpush
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm mb-4">
            <div class="card-body text-center">
                <h2 class="fw-bold mb-4">Laporan Penjualan & Pengeluaran</h2>
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="p-4 border rounded bg-light h-100">
                            <h5 class="mb-3">Laporan Penjualan</h5>
                            <a href="{{ route('transactions.index') }}" class="btn btn-primary w-100">Lihat Penjualan</a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-4 border rounded bg-light h-100">
                            <h5 class="mb-3">Laporan Pengeluaran</h5>
                            <a href="{{ route('expenses.index') }}" class="btn btn-primary w-100">Lihat Pengeluaran</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
