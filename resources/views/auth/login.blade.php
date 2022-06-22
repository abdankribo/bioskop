@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 500px;">
    <div class="mt-5 text-light">blank</div>
    @if (session()->has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session()->get('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="row mt-5">
        <h1 class="text-center">Nonton Id</h1>
    </div>
    <form action="/login" class="mt-5" method="POST">
        @csrf
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control @error('username') is-invalid @enderror" id="username"
                name="username" placeholder="Username" required value="{{ old('username') }}">
            @error('username')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label text-bold">Password</label>
            <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
        </div>
        <div class="mt-4 d-grid">
            <button class="btn btn-success">Masuk</button>
        </div>
    </form>
</div>
@endsection