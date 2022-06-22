@extends('layouts.app')

@section('content')
@include('layouts.navbar')
<div class="container mt-5">
    <h2 class="mb-4">Daftar Film</h2>
    <table class="table table-hover">
        <thead class="text-center">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Judul Film</th>
                <th scope="col">Jam Tayang</th>
                <th scope="col">Tanggal Tayang</th>
                <th scope="col">Sisa Tiket</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody class="text-center align-self-center">
            @foreach ($films as $film)
            <tr>
                <td>{{ $i++ }}</td>
                <td class="text-start">{{ $film -> judul }}</td>
                <td>{{ $film -> jam_tayang }}</td>
                <td>{{ $film -> tgl_tayang }}</td>
                <td>{{ $film -> tiket }}</td>
                <td>
                    <div class="row justify-content-center">
                        <div class="col-auto">
                            <a href="/film/{{ $film -> id }}/edit" class="btn btn-success bi bi-pencil"></a>
                        </div>
                        <div class="col-auto">
                            <form action="/film/{{ $film -> id }}" method="post">
                                @csrf
                                @method("delete")
                                <button class="btn btn-danger bi bi-trash"></button>
                            </form>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection