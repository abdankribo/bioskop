<nav class="navbar navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand">Nonton id</a>
        <form action="/logout" class="d-flex" method="POST">
            @csrf
            @if (auth()->user()->is_admin == 1)
            <a class="nav-link" href="/film">Film</a>
            <a class="nav-link" href="/film/create">Tambah Film</a>
            @endif
            <button class="btn btn-outline-success" type="submit">keluar</button>
        </form>
    </div>
</nav>