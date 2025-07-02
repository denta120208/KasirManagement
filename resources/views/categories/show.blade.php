@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Kategori</h1>
    <div class="mb-3">
        <strong>Nama:</strong> {{ $category->name }}
    </div>
    <a href="{{ route('categories.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
