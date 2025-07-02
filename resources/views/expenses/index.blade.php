@extends('layouts.modern')
@section('title', 'Data Pengeluaran')
@push('nav')
    @role('admin')
        <li class="nav-item"><a class="nav-link" href="{{ route('expenses.index') }}">Pengeluaran</a></li>
    @elserole('kasir')
        <li class="nav-item"><a class="nav-link" href="{{ route('expenses.index') }}">Pengeluaran</a></li>
    @elserole('pemilik')
        <li class="nav-item"><a class="nav-link" href="{{ route('expenses.index') }}">Laporan Pengeluaran</a></li>
    @endrole
@endpush

@section('content')
<div class="container">
    <h1>Data Pengeluaran</h1>
    @if(auth()->user()->hasRole('admin'))
    <a href="{{ route('expenses.create') }}" class="btn btn-primary mb-3">Tambah Pengeluaran</a>
    @elseif(auth()->user()->hasRole('kasir'))
    <a href="{{ route('expenses.create') }}" class="btn btn-primary mb-3">Tambah Pengeluaran</a>
    @endif
    <a href="{{ route('expenses.exportExcel') }}" class="btn btn-success mb-3">Export Excel</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jumlah</th>
                <th>Tanggal</th>
                <th>Keterangan</th>
                @if(auth()->user()->hasRole('admin'))
                <th>Aksi</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($expenses as $expense)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $expense->name }}</td>
                <td>{{ number_format($expense->amount,0,',','.') }}</td>
                <td>{{ $expense->date }}</td>
                <td>{{ $expense->description }}</td>
                @if(auth()->user()->hasRole('admin'))
                <td>
                    <a href="{{ route('expenses.edit', $expense->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('expenses.destroy', $expense->id) }}" method="POST" style="display:inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                    </form>
                </td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
