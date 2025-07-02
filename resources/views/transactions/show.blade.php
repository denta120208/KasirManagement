@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Transaksi</h1>
    <div class="mb-3">
        <strong>No Struk:</strong> {{ $transaction->receipt_number ?? '-' }}
    </div>
    <div class="mb-3">
        <strong>Kasir:</strong> {{ $transaction->user->name ?? '-' }}
    </div>
    <div class="mb-3">
        <strong>Total:</strong> {{ number_format($transaction->total,0,',','.') }}
    </div>
    <div class="mb-3">
        <strong>Diskon:</strong> {{ number_format($transaction->discount,0,',','.') }}
    </div>
    <div class="mb-3">
        <strong>Pembayaran:</strong> {{ ucfirst($transaction->payment_method ?? '-') }}
    </div>
    <div class="mb-3">
        <strong>Tanggal:</strong> {{ $transaction->created_at }}
    </div>
    <a href="{{ route('transactions.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
