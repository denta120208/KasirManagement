@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Data Menu</h1>
    <a href="{{ route('menus.create') }}" class="btn btn-primary mb-3">Tambah Menu</a>
    <a href="{{ route('menus.exportExcel') }}" class="btn btn-success mb-3">Export Excel</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($menus as $menu)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $menu->name }}</td>
                <td>{{ $menu->category->name ?? '-' }}</td>
                <td>{{ number_format($menu->price,0,',','.') }}</td>
                <td>{{ $menu->stock }}</td>
                <td>
                    @if($menu->image)
                        <img src="{{ asset('storage/'.$menu->image) }}" width="60">
                    @endif
                </td>
                <td>
                    <a href="{{ route('menus.edit', $menu->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('menus.destroy', $menu->id) }}" method="POST" style="display:inline-block">
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
