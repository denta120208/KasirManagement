@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Meja</h1>
    <div class="mb-3">
        <strong>Nomor Meja:</strong> {{ $table->number }}
    </div>
    <div class="mb-3">
        <strong>Status:</strong> {{ ucfirst($table->status) }}
    </div>
    <a href="{{ route('tables.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
