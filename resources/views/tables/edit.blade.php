@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Meja</h1>
    <form action="{{ route('tables.update', $table->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Nomor Meja</label>
            <input type="text" name="number" class="form-control" value="{{ $table->number }}" required>
        </div>
        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control" required>
                <option value="kosong" {{ $table->status == 'kosong' ? 'selected' : '' }}>Kosong</option>
                <option value="diisi" {{ $table->status == 'diisi' ? 'selected' : '' }}>Diisi</option>
                <option value="selesai" {{ $table->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('tables.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
