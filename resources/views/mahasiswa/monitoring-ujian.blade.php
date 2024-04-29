@extends('layouts.main')
@section('main-contents')
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Monitoring Ujian</h3>
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
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Jenis Ujian</th>
                                        <th>Nama Lengkap</th>
                                        <th>NIM</th>
                                        <th>Judul</th>
                                        <th>Nilai Ujian</th>
                                        <th>Berkas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ujians as $ujian)
                                        <tr class="text-center">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                @if ($ujian->jenis_ujian == 'proposal')
                                                    <div class="badge badge-soft-primary">Proposal</div>
                                                @elseif ($ujian->jenis_ujian == 'hasil')
                                                    <div class="badge badge-soft-secondary">Hasil</div>
                                                @else
                                                    <div class="badge badge-soft-success">Skripsi</div>
                                                @endif
                                            </td>
                                            <td class="text-wrap">{{ $ujian->mahasiswa->nama }}</td>
                                            <td>{{ $ujian->mahasiswa->nim }}</td>
                                            <td class="text-start text-wrap">{{ $ujian->judul }}</td>
                                            <td>{{ $ujian->nilai_ujian }}</td>
                                            <td class="text-start text-wrap">
                                                <button class="btn-sm btn-success mx-1 my-1">Berkas 1</button>
                                                <button class="btn-sm btn-warning mx-1 my-1">Berkas 2</button>
                                                <button class="btn-sm btn-info mx-1 my-1">Berkas 3</button>
                                                <button class="btn-sm btn-primary mx-1 my-1">Berkas 4</button>
                                                <button class="btn-sm btn-secondary mx-1 my-1">Berkas 5</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
