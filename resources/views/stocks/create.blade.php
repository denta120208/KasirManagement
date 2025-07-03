@extends('layouts.modern')
@section('title', 'Tambah Stok')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-4 fw-bold text-primary">Tambah Stok</h4>
                    @if($errors->any())
                        <div class="alert alert-danger">{{ $errors->first() }}</div>
                    @endif
                    <form method="POST" action="{{ route('stocks.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nama Stok</label>
                            <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jumlah</label>
                            <input type="number" name="quantity" class="form-control" required value="{{ old('quantity') }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Satuan</label>
                            <input type="text" name="unit" class="form-control" required value="{{ old('unit') }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Stok Minimum</label>
                            <input type="number" name="min_stock" class="form-control" required value="{{ old('min_stock') }}">
                        </div>
                        <button type="submit" class="btn btn-success w-100">Simpan</button>
                        <a href="{{ route('stocks.index') }}" class="btn btn-secondary w-100 mt-2">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
