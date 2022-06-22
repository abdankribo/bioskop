@extends('layouts.app')

@section('content')
@include('layouts.navbar')
<div class="container mt-5">
    <h2 class="mb-4">Tambah Daftar Film</h2>
    <form action="/film" method="post">
        @csrf
        <div class="mb-3">
            <label for="judul" class="form-label">Judul Film</label>
            <input type="text" class="form-control" id="judul" name="judul">
        </div>
        <div class="mb-3">
            <div class="row g-3">
                <div class="col">
                    <label for="jam" class="form-label">Jam</label>
                    <input type="time" class="form-control" id="jam" name="jam_tayang">
                </div>
                <div class="col">
                    <label for="date" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" id="date" name="tgl_tayang">
                </div>
                <div class="col">
                    <label for="tiket" class="form-label">Jumlah Tiket</label>
                    <input type="number" class="form-control" id="tiket" name="tiket">
                </div>
            </div>
        </div>
        <div class="mt-4">
            <div class="row g-3">
                <div class="offset-8 col-4 d-grid">
                    <button type="submit" class="btn btn-success">Tambah</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection