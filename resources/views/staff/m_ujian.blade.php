@extends('layouts.main')
@section('main-contents')
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Monitoring Ujian</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Monitoring Ujian</a></li>
                            <li class="breadcrumb-item active">Semua</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="settings-menu-links">
            <ul class="nav nav-tabs menu-tabs">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('s-m_ujian-index') }}">Semua</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('s-m_proposal-index') }}">Proposal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{ route('s-m_hasil-index') }}">Hasil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('s-m_skripsi-index') }}">Skripsi</a>
                </li>
            </ul>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table comman-shadow">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="excelTable" class="display table table-hover table-striped" style="width:100%">
                                <thead class="student-thread">
                                    <tr class="text-center">
                                        <th style="background-color: #3d5ee1" class="excel-column text-white col-1">No</th>
                                        <th style="background-color: #3d5ee1" class="excel-column text-white col-1 d-none">
                                            Tanggal Ujian
                                        </th>
                                        <th style="background-color: #3d5ee1" class="excel-column text-white col-1 d-none">
                                            Waktu Ujian
                                        </th>
                                        <th style="background-color: #3d5ee1" class="excel-column text-white col-1">Jenis
                                            Ujian</th>
                                        <th style="background-color: #3d5ee1" class="excel-column text-white col-3">Nama
                                            Lengkap</th>
                                        <th style="background-color: #3d5ee1" class="excel-column text-white col-2">NIM</th>
                                        <th style="background-color: #3d5ee1" class="excel-column text-white col-5">Judul
                                        </th>
                                        <th style="background-color: #3d5ee1" class="excel-column text-white col-5 d-none">
                                            Tempat Ujian
                                        </th>
                                        <th style="background-color: #3d5ee1" class="excel-column text-white col-5 d-none">
                                            IPK</th>
                                        <th style="background-color: #3d5ee1" class="excel-column text-white col-5 d-none">
                                            Pembimbing 1
                                        </th>
                                        <th style="background-color: #3d5ee1" class="excel-column text-white col-5 d-none">
                                            Pembimbing 2
                                        </th>
                                        <th style="background-color: #3d5ee1" class="excel-column text-white col-5 d-none">
                                            Penguji 1</th>
                                        <th style="background-color: #3d5ee1" class="excel-column text-white col-5 d-none">
                                            Penguji 2</th>
                                        <th style="background-color: #3d5ee1" class="excel-column text-white col-5 d-none">
                                            Penguji 3</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ujian as $key => $item)
                                        <tr class="text-center">
                                            <td class="excel-column">{{ $loop->iteration }}</td>
                                            <td class="excel-column d-none">{{ $item->tanggal_ujian }}</td>
                                            <td class="excel-column d-none">{{ $item->jam_ujian }}</td>
                                            <td class="excel-column">{{ Str::ucfirst($item->jenis_ujian) }}</td>
                                            <td class="excel-column">{{ $item->mahasiswa->nama }}</td>
                                            <td class="excel-column">{{ $item->mahasiswa->nim }}</td>
                                            <td class="excel-column">{{ $item->judul }}</td>
                                            <td class="excel-column d-none">{{ $item->tempat_ujian }}</td>
                                            <td class="excel-column d-none">{{ $item->ipk_sementara }}</td>
                                            <td class="excel-column d-none">{{ $item->pembimbing_1->nama_dosen }}</td>
                                            <td class="excel-column d-none">{{ $item->pembimbing_2->nama_dosen }}</td>
                                            <td class="excel-column d-none">{{ $item->penguji_1->nama_dosen }}</td>
                                            <td class="excel-column d-none">{{ $item->penguji_2->nama_dosen }}</td>
                                            <td class="excel-column d-none">{{ $item->penguji_3->nama_dosen }}</td>
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
