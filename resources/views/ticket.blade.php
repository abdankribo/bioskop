@extends('layouts.app')

@section('content')
@include('layouts.navbar')
<div class="container-fluid row justify-content-center align-items-center" style="height: 70vh;">
    <div class="card border-success" style="max-width: 60vw;">
        <div class="card-body text-success">
            <p class="card-text p-5 display-4 text-center">{{ $film -> judul }}</p>
        </div>
        <a href="/film/show" class="btn btn-success btn-lg">kembali</a>
    </div>
</div>
@endsection