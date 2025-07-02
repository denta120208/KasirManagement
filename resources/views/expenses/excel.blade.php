@extends('layouts.modern')
@section('title', 'Export Data Pengeluaran')
@section('content')
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Jumlah</th>
            <th>Tanggal</th>
            <th>Keterangan</th>
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
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
