@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Menu</h1>
    <div class="mb-3">
        <strong>Nama:</strong> {{ $menu->name }}
    </div>
    <div class="mb-3">
        <strong>Kategori:</strong> {{ $menu->category->name ?? '-' }}
    </div>
    <div class="mb-3">
        <strong>Harga:</strong> {{ number_format($menu->price,0,',','.') }}
    </div>
    <div class="mb-3">
        <strong>Stok:</strong> {{ $menu->stock }}
    </div>
    <div class="mb-3">
        <strong>Deskripsi:</strong> {{ $menu->description }}
    </div>
    <div class="mb-3">
        <strong>Gambar:</strong>
        @if($menu->image)
            <img src="{{ asset('storage/'.$menu->image) }}" width="120">
        @endif
    </div>
    <a href="{{ route('menus.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
