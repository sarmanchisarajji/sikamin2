@extends('layouts.main')
@section('main-contents')
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Profil Mahasiswa</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Profil</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                @if (session('success'))
                    @include('mahasiswa.components.alert-success', ['message' => session('success')])
                @endif
                @if ($errors->any())
                    @include('mahasiswa.components.alert-danger', ['errors' => $errors->all()])
                @endif
                <div class="profile-header">
                    <div class="row align-items-center">
                        <div class="col-auto profile-image">
                            <a href="#">
                                <img class="rounded-circle" alt="{{ $mahasiswa->nama }}"
                                    src="{{ asset("storage/$user->foto") }}">
                            </a>
                        </div>
                        <div class="col ms-md-n2 profile-user-info">
                            <h4 class="user-name mb-0">{{ $mahasiswa->nama }}</h4>
                            <h6 class="text-muted">{{ $mahasiswa->nim }}</h6>
                            <div class="about-text">Jurusan Teknik Informatika Angkatan {{ $mahasiswa->tahun_masuk }}</div>
                        </div>
                        <div class="col-auto profile-btn">
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#fotoModal">
                                Edit Foto Profil
                            </button>
                        </div>
                    </div>

                    {{--  Modal Edit Foto Profil --}}
                    <div id="fotoModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                        aria-hidden="true" style="display: none;">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Edit Foto Profil</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body p-4">
                                    <form action="{{ url('mahasiswa/profil/update-foto') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="foto" class="form-label">Unggah Foto</label>
                                                    <p class="text-danger">Maksimal 2 MB dan disarankan menggunakan rasio
                                                        foto 1:1</p>
                                                    <input type="file" name="foto" @error('foto') is-invalid @enderror
                                                        class="form-control" id="foto" placeholder="Unggah File"
                                                        required accept=".png, .jpg, .jpeg">
                                                    @error('foto')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary waves-effect"
                                        data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-info waves-effect waves-light">Simpan</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="profile-menu">
                    <ul class="nav nav-tabs nav-tabs-solid">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#per_details_tab">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#password_tab">Password</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content profile-tab-cont">

                    <div class="tab-pane fade show active" id="per_details_tab">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title d-flex justify-content-between">
                                            <span>Detail Mahasiswa</span>
                                            <button class="btn btn-light edit-link" data-bs-toggle="modal"
                                                data-bs-target="#dataModal"><i class="far fa-edit me-1"></i>Edit</button>
                                        </h5>
                                        <div class="row">
                                            <p class="col-sm-6 text-muted text-sm-end mb-0 mb-sm-3">Nama Lengkap</p>
                                            <p class="col-sm-6">{{ $mahasiswa->nama }}</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-6 text-muted text-sm-end mb-0 mb-sm-3">Nomor Induk Mahasiswa
                                            </p>
                                            <p class="col-sm-6">{{ $mahasiswa->nim }}</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-6 text-muted text-sm-end mb-0 mb-sm-3">Username Akun
                                            </p>
                                            <p class="col-sm-6">{{ $user->username }}</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-6 text-muted text-sm-end mb-0 mb-sm-3">Email
                                            </p>
                                            <p class="col-sm-6">{{ $user->email }}</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-6 text-muted text-sm-end mb-0 mb-sm-3">Nomor Telepon
                                            </p>
                                            <p class="col-sm-6">{{ $user->no_hp }}</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-6 text-muted text-sm-end mb-0 mb-sm-3">Jenis Akun
                                            </p>
                                            <p class="col-sm-6">{{ Str::ucfirst($user->user_type) }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="dataModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                        aria-hidden="true" style="display: none;">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Edit Profil</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body p-4">
                                    <form action="{{ url('mahasiswa/profil/update-data') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="nama" class="form-label">Nama Lengkap</label>
                                                    <input type="text" name="nama"
                                                        @error('nama') is-invalid @enderror class="form-control"
                                                        id="nama" placeholder="Masukkan Nama Lengkap"
                                                        value="{{ old('nama', $mahasiswa->nama) }}" required>
                                                    @error('nama')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="nim" class="form-label">NIM</label>
                                                    <input type="text" name="nim"
                                                        @error('nim') is-invalid @enderror class="form-control"
                                                        id="nim" placeholder="Masukkan NIM"
                                                        value="{{ old('nim', $mahasiswa->nim) }}" required>
                                                    @error('nim')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="username" class="form-label">Username Akun</label>
                                                    <input type="text" name="username"
                                                        @error('username') is-invalid @enderror class="form-control"
                                                        id="username" placeholder="Masukkan username"
                                                        value="{{ old('username', $user->username) }}" required>
                                                    @error('username')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="email" name="email"
                                                        @error('email') is-invalid @enderror class="form-control"
                                                        id="email" placeholder="Masukkan email"
                                                        value="{{ old('email', $user->email) }}" required>
                                                    @error('email')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="no_hp" class="form-label">Nomor Telepon</label>
                                                    <input type="text" name="no_hp"
                                                        @error('no_hp') is-invalid @enderror class="form-control"
                                                        id="no_hp" placeholder="Masukkan no_hp"
                                                        value="{{ old('no_hp', $user->no_hp) }}" required>
                                                    @error('no_hp')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary waves-effect"
                                        data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-info waves-effect waves-light">Simpan</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div id="password_tab" class="tab-pane fade">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Ganti Kata Sandi</h5>
                                <div class="row">
                                    <div class="col-md-10 col-lg-6">
                                        <form action="{{ url('mahasiswa/profil/ganti-password') }}" method="POST">
                                            @method('PUT')
                                            @csrf
                                            <div class="form-group">
                                                <label>Kata Sandi Lama</label>
                                                <input type="password" name="old_password" class="form-control">
                                                @error('old_password')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Kata Sandi Baru</label>
                                                <input type="password" name="new_password" class="form-control">
                                                @error('new_password')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Konfirmasi Kata Sandi Baru</label>
                                                <input type="password" name="confirm_new_password" class="form-control">
                                                @error('confirm_new_password')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <button class="btn btn-primary" type="submit">Simpan Sandi</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
