@extends('layouts.modern')
@section('title', 'Data Stok')
@push('nav')
    @role('admin')
        <li class="nav-item"><a class="nav-link" href="{{ route('stocks.index') }}">Stok</a></li>
    @endrole
@endpush
@section('content')
<div class="container">
    <h1>Data Stok</h1>
    <a href="{{ route('stocks.create') }}" class="btn btn-primary mb-3">Tambah Stok</a>
    <a href="{{ route('stocks.exportExcel') }}" class="btn btn-success mb-3">Export Excel</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jumlah</th>
                <th>Satuan</th>
                <th>Stok Minimum</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($stocks as $stock)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $stock->name }}</td>
                <td>{{ $stock->quantity }}</td>
                <td>{{ $stock->unit }}</td>
                <td>{{ $stock->min_stock }}</td>
                <td>
                    <a href="{{ route('stocks.edit', $stock->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('stocks.destroy', $stock->id) }}" method="POST" style="display:inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
