@extends('layouts.app')

@section('content')
    @include('layouts.navbar')
    <div class="container my-5">
        @if (session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session()->get('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="row mb-4 justify-content-between align-items-center">
            <div class="col-auto">
                <h2 class="">Report</h2>
            </div>
            <div class="col-auto">
                <a href="/film/print" class="btn btn-success">Cetak</a>
            </div>
            <div class="col-auto">
                <a href="/film/word" class="btn btn-success">Word</a>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        {!! $ticketFilmChart->container() !!}
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        {!! $logActivityChart->container() !!}
                    </div>
                </div>
            </div>
        </div>
        <h2 class="mb-4">Transaction</h2>
        <div id="exportContent">
            <table class="table table-hover" id="table-datatables">
                <thead class="text-center">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Username</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Tanggal Beli</th>
                    </tr>
                </thead>
                <tbody class="text-center align-self-center">
                    @foreach ($transactions as $transaction)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td class="text-start">{{ $transaction->username }}</td>
                            <td class="text-start">{{ $transaction->judul }}</td>
                            <td>{{ $transaction->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>

            </table>

        </div>

    </div>
    <script src="{{ $ticketFilmChart->cdn() }}"></script>
    {{ $ticketFilmChart->script() }}
    <script src="{{ $logActivityChart->cdn() }}"></script>
    {{ $logActivityChart->script() }}

    {{-- js for datatables --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>

    {{-- script export --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('#table-datatables').DataTable({
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'excelHtml5',
                        title: 'Transaction',
                        className: 'btn-outline-secondary'
                    },
                    {
                        extend: 'pdfHtml5',
                        title: 'Transaction'
                    },
                ]
            });
        });
    </script>
@endsection
