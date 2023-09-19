@extends('layouts.app')

@section('content')
    @include('layouts.navbar')
    <div class="container-fluid row justify-content-center">
        @if (session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session()->get('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="row" style="width: 70vw;">
            <div class="row text-center mt-5">
                <h1>TIKET FILM YANG TERSEDIA</h1>
            </div>
            <div class="row justify-content-center mt-3">
                <div class="col-auto">
                    <a href="/film/show" class="btn btn-success">Semua Kategori</a>
                </div>
                <div class="col-auto">
                    <a href="/film/show/action" class="btn btn-success">Action</a>
                </div>
                <div class="col-auto">
                    <a href="/film/show/horror" class="btn btn-success">Horror</a>
                </div>
                <div class="col-auto">
                    <a href="/film/show/romance" class="btn btn-success">Romance</a>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach ($films as $film)
                    <div class="col">
                        <div class="card">
                            <div class="card-header text-center">
                                <h4>{{ $film->judul }}</h4>
                            </div>
                            <div class="card-body">
                                <p class="card-text">
                                <div class="row text-center">
                                    <div class="col ">
                                        <b>Jam Tayang</b>
                                        <p>{{ $film->jam_tayang }}</p>
                                    </div>
                                    <div class="col-auto">
                                        <b>Tanggal Tayang</b>
                                        <p>{{ $film->tgl_tayang }}</p>
                                    </div>
                                    <div class="col">
                                        <b>Sisa Tiket</b>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-ticket-perforated-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M0 4.5A1.5 1.5 0 0 1 1.5 3h13A1.5 1.5 0 0 1 16 4.5V6a.5.5 0 0 1-.5.5 1.5 1.5 0 0 0 0 3 .5.5 0 0 1 .5.5v1.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 11.5V10a.5.5 0 0 1 .5-.5 1.5 1.5 0 1 0 0-3A.5.5 0 0 1 0 6V4.5Zm4-1v1h1v-1H4Zm1 3v-1H4v1h1Zm7 0v-1h-1v1h1Zm-1-2h1v-1h-1v1Zm-6 3H4v1h1v-1Zm7 1v-1h-1v1h1Zm-7 1H4v1h1v-1Zm7 1v-1h-1v1h1Zm-8 1v1h1v-1H4Zm7 1h1v-1h-1v1Z" />
                                        </svg>
                                        {{ $film->tiket }}
                                    </div>
                                </div>
                                </p>
                            </div>
                            <div class="card-footer text-center">
                                <a href="/film/{{ $film->id }}" class="btn btn-success">pesan</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
