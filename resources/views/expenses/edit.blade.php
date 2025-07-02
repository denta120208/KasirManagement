@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Pengeluaran</h1>
    <form action="{{ route('expenses.update', $expense->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="name" class="form-control" value="{{ $expense->name }}" required>
        </div>
        <div class="mb-3">
            <label>Jumlah</label>
            <input type="number" name="amount" class="form-control" value="{{ $expense->amount }}" required>
        </div>
        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="date" class="form-control" value="{{ $expense->date }}" required>
        </div>
        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="description" class="form-control">{{ $expense->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('expenses.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
