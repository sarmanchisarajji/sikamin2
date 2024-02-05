@extends('layouts.main')
@section('main-contents')
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Kelola Data Ujian</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/mahasiswa/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active">Monitoring Ujian</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table comman-shadow">
                    <div class="card-body">
                        <div class="page-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="page-title">Monitoring Ujian</h3>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="datatable table table-hover table-striped">
                                <thead class="student-thread">
                                    <tr>
                                        <th>Jenis Ujian</th>
                                        <th>Nama Lengkap</th>
                                        <th>NIM</th>
                                        <th>Judul</th>
                                        <th>Nilai Ujian</th>
                                        <th>Berkas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <p>Copyright © 2022 Dreamguys.</p>
    </footer>
@endsection
