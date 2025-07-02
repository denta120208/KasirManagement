@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Input Transaksi</h1>
    <form action="{{ route('transactions.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Total</label>
            <input type="number" name="total" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Diskon</label>
            <input type="number" name="discount" class="form-control" value="0">
        </div>
        <div class="mb-3">
            <label>Bayar</label>
            <input type="number" name="paid" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Metode Pembayaran</label>
            <select name="payment_method" class="form-control" required>
                <option value="cash">Tunai</option>
                <option value="qris">QRIS</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('transactions.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
