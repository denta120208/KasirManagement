@extends('layouts.app')
@section('content')
<div class="row justify-content-center align-items-center" style="min-height: 90vh; background: #f8fafc;">
    <div class="col-md-5 col-lg-4">
        <div class="card shadow-lg border-0" style="border-radius:1.5rem; background:rgba(255,255,255,0.98);">
            <div class="card-body p-5">
                <div class="text-center mb-4">
                    <div style="font-size:3rem; color:#6366f1; margin-bottom:0.5rem;">
                        <svg width="48" height="48" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="24" cy="24" r="24" fill="#e0e7ff"/><path d="M32 18c0-2.21-2.24-4-5-4s-5 1.79-5 4v2h10v-2Z" fill="#6366f1"/><rect x="16" y="20" width="16" height="10" rx="5" fill="#6366f1"/><rect x="20" y="24" width="8" height="4" rx="2" fill="#fff"/></svg>
                    </div>
                    <h3 class="fw-bold mb-0" style="color:#6366f1; letter-spacing:1px;">Kasir Cafe</h3>
                    <div class="text-muted mb-2" style="font-size:1.1rem;">Login ke akun Anda</div>
                </div>
                @if(session('status'))
                    <div class="alert alert-success">{{ session('status') }}</div>
                @endif
                @if($errors->any())
                    <div class="alert alert-danger">{{ $errors->first() }}</div>
                @endif
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control form-control-lg" required autofocus value="{{ old('email') }}" placeholder="Masukkan email..." style="transition:box-shadow 0.2s;">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control form-control-lg" required placeholder="Masukkan password..." style="transition:box-shadow 0.2s;">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" name="remember" class="form-check-input" id="remember_me">
                        <label class="form-check-label" for="remember_me">Remember me</label>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 py-2" style="font-size:1.1rem;">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>
<style>
    .form-control:focus {
        box-shadow: 0 0 0 0.2rem rgba(99,102,241,.15);
        border-color: #6366f1;
    }
    .card {
        transition: box-shadow 0.2s, transform 0.2s;
    }
    .card:hover {
        box-shadow: 0 8px 32px rgba(99,102,241,0.18);
        transform: translateY(-2px) scale(1.01);
    }
</style>
@endsection
