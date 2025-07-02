@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Pengeluaran</h1>
    <div class="mb-3">
        <strong>Nama:</strong> {{ $expense->name }}
    </div>
    <div class="mb-3">
        <strong>Jumlah:</strong> {{ number_format($expense->amount,0,',','.') }}
    </div>
    <div class="mb-3">
        <strong>Tanggal:</strong> {{ $expense->date }}
    </div>
    <div class="mb-3">
        <strong>Keterangan:</strong> {{ $expense->description }}
    </div>
    <a href="{{ route('expenses.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
