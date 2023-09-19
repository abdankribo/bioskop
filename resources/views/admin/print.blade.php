@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        @if (session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session()->get('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <h2 class="mb-4">Report</h2>
        <div class="card mb-4">
            <div class="card-body">
                {!! $ticketFilmChart->container() !!}
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-body">
                {!! $logActivityChart->container() !!}
            </div>
        </div>

    </div>
    <script src="{{ $ticketFilmChart->cdn() }}"></script>
    {{ $ticketFilmChart->script() }}
    <script src="{{ $logActivityChart->cdn() }}"></script>
    {{ $logActivityChart->script() }}
    <script type="text/javascript">
        window.onload = function() {
            setTimeout(() => {
                window.print();
            }, 1000);
        }
    </script>
@endsection
