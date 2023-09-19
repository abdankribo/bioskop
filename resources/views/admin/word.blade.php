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
                <h2 class="">Transaction</h2>
            </div>
            <div class="col-auto">
                <button onclick="Export2Word('exportContent', 'transaction');" class="btn btn-success">Cetak
                    Word</button>
            </div>
        </div>
        <div id="exportContent">
            <table class="table table-hover">
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

    {{-- script export --}}
    <script type="text/javascript">
        function Export2Word(element, filename = '') {
            var preHtml =
                "<html xmlns:o='urn:schemas-microsoft-com:office:office' xmlns:w='urn:schemas-microsoft-com:office:word' xmlns='http://www.w3.org/TR/REC-html40'><head><meta charset='utf-8'><title>Export HTML To Doc</title></head><body>";
            var postHtml = "</body></html>";
            var html = preHtml + document.getElementById(element).innerHTML + postHtml;

            var blob = new Blob(['\ufeff', html], {
                type: 'application/msword'
            });

            // Specify link url
            var url = 'data:application/vnd.ms-word;charset=utf-8,' + encodeURIComponent(html);

            // Specify file name
            filename = filename ? filename + '.doc' : 'document.doc';

            // Create download link element
            var downloadLink = document.createElement("a");

            document.body.appendChild(downloadLink);

            if (navigator.msSaveOrOpenBlob) {
                navigator.msSaveOrOpenBlob(blob, filename);
            } else {
                // Create a link to the file
                downloadLink.href = url;

                // Setting the file name
                downloadLink.download = filename;

                //triggering the function
                downloadLink.click();
            }

            document.body.removeChild(downloadLink);
        }
    </script>
@endsection
