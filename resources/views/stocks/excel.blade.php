@extends('layouts.modern')
@section('title', 'Export Data Stok')
@section('content')
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Jumlah</th>
            <th>Satuan</th>
            <th>Stok Minimum</th>
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
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
