<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <ul>
        <li class="fw-bold">Kata Sandi Gagal Diupdate</li>
        @foreach ($errors as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
