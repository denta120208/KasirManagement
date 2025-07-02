@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Data Meja</h1>
    <a href="{{ route('tables.create') }}" class="btn btn-primary mb-3">Tambah Meja</a>
    <a href="{{ route('tables.exportExcel') }}" class="btn btn-success mb-3">Export Excel</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nomor Meja</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tables as $table)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $table->number }}</td>
                <td>{{ ucfirst($table->status) }}</td>
                <td>
                    <a href="{{ route('tables.edit', $table->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('tables.destroy', $table->id) }}" method="POST" style="display:inline-block">
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
