@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Meja</h1>
    <form action="{{ route('tables.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nomor Meja</label>
            <input type="text" name="number" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control" required>
                <option value="kosong">Kosong</option>
                <option value="diisi">Diisi</option>
                <option value="selesai">Selesai</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('tables.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
