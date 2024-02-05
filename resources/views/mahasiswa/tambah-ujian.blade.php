@extends('layouts.main')
@section('main-contents')
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Tambah Data Ujian</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/mahasiswa/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/mahasiswa/dashboard/pengajuan-ujian">Management Ujian</a></li>
                        <li class="breadcrumb-item active">Tambah Ujian</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Input Data Ujian</h5>
                    </div>
                    <div class="card-body">
                        <form action="#">
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Nama Lengkap</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" disabled="disabled">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">NIM</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" disabled="disabled">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Judul Penelitian</label>
                                <div class="col-md-10">
                                    <textarea rows="5" cols="5" class="form-control" placeholder="Enter text here"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">IPK Sementara</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Pembimbing 1</label>
                                <div class="col-md-10">
                                    <select class="form-control form-select">
                                        <option>~ Pilih Dosen ~</option>
                                        <option>Sarman Chisara</option>
                                        <option>Amhar Rayadin</option>
                                        <option>Akbar Asad</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Pembimbing 1</label>
                                <div class="col-md-10">
                                    <select class="form-control form-select">
                                        <option>~ Pilih Dosen ~</option>
                                        <option>Sarman Chisara</option>
                                        <option>Amhar Rayadin</option>
                                        <option>Akbar Asad</option>
                                    </select>
                                </div>
                            </div>
                            <div class="text-center mt-5 col-md-12">
                                <button type="submit" class="btn btn-primary">Submit Ujian</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <p>Copyright © 2022 Dreamguys.</p>
    </footer>
@endsection
