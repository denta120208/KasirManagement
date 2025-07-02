@extends('layouts.modern')

@push('nav')
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
@endpush

@section('title', 'Data Transaksi')
@section('content')
<div class="container">
    <h1>Data Transaksi</h1>
    @if(auth()->user()->hasAnyRole(['admin','kasir']))
    <a href="{{ route('transactions.create') }}" class="btn btn-primary mb-3">Tambah Transaksi</a>
    @endif
    <a href="{{ route('transactions.exportExcel') }}" class="btn btn-success mb-3">Export Excel</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>No Struk</th>
                <th>Kasir</th>
                <th>Total</th>
                <th>Diskon</th>
                <th>Pembayaran</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $trx)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $trx->receipt_number ?? '-' }}</td>
                <td>{{ $trx->user->name ?? '-' }}</td>
                <td>{{ number_format($trx->total,0,',','.') }}</td>
                <td>{{ number_format($trx->discount,0,',','.') }}</td>
                <td>{{ ucfirst($trx->payment_method ?? '-') }}</td>
                <td>{{ $trx->created_at }}</td>
                <td>
                    <a href="{{ route('transactions.show', $trx->id) }}" class="btn btn-info btn-sm">Detail</a>
                    @if(auth()->user()->hasRole('admin'))
                    <a href="{{ route('transactions.edit', $trx->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('transactions.destroy', $trx->id) }}" method="POST" style="display:inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                    </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
