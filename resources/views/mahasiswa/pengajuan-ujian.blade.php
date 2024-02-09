@extends('layouts.main')
@section('main-contents')
    <div class="content container-fluid min-100">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Kelola Data Ujian</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/mahasiswa/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active">Pengajuan Ujian</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                @if (session('success'))
                    @include('mahasiswa.components.alert-success', ['message' => session('success')])
                @endif
                <div class="card card-table comman-shadow">
                    <div class="card-body">
                        <div class="page-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="page-title">Data Ujian</h3>
                                </div>
                                <div class="col-auto text-end float-end ms-auto download-grp">
                                    <a href="{{ url('mahasiswa/form-ujian') }}" class="btn btn-primary">
                                        <i class="fas fa-plus"></i> Pengajuan Ujian
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="example" class="display table table-hover table-striped" style="width:100%">
                                <thead class="">
                                    <tr class="text-center">
                                        <th style="width: 30px">No</th>
                                        <th style="width: 100px">Action</th>
                                        <th>Jenis Ujian</th>
                                        <th>Status</th>
                                        <th>Nama Lengkap</th>
                                        <th>NIM</th>
                                        <th>Judul</th>
                                        <th>IPK Sementara</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ujians as $ujian)
                                        <tr class="text-center">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <span><a href="{{ url("/mahasiswa/form-ujian/$ujian->id") }}"><button
                                                            class="btn btn-sm btn-warning" title="Edit">
                                                            <i class="fas fa-edit"></i></button></a></span>
                                                <form class="d-inline"
                                                    action="{{ url("mahasiswa/pengajuan-ujian/delete/$ujian->id") }}"
                                                    method="POST">
                                                    @method('delete')
                                                    @csrf
                                                    <span><button onclick="return confirm('Lanjutkan untuk menghapus?')"
                                                            type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                                            <i class="fas  fa-trash"></i></button></span>
                                                </form>
                                                <div class="mt-1"><a
                                                        href="{{ url("/mahasiswa/pengajuan-ujian/bukti-dukung/$ujian->id") }}"><button
                                                            class="btn btn-sm btn-success" title="Tambah Berkas Pendukung">
                                                            Bukti Dukung</button></a></div>
                                            </td>
                                            <td>
                                                @if ($ujian->jenis_ujian == 'proposal')
                                                    <div class="badge badge-soft-primary">Proposal</div>
                                                @elseif ($ujian->jenis_ujian == 'hasil')
                                                    <div class="badge badge-soft-secondary">Hasil</div>
                                                @else
                                                    <div class="badge badge-soft-success">Skripsi</div>
                                                @endif
                                            </td>

                                            <td>
                                                @if ($ujian->status == 'diajukan')
                                                    <div class="badge badge-soft-primary">Diajukan</div>
                                                @elseif ($ujian->status == 'disetujui')
                                                    <div class="badge badge-soft-secondary">Disetujui</div>
                                                @else
                                                    <div class="badge badge-soft-success">Selesai</div>
                                                @endif
                                            </td>
                                            <td class="text-wrap">{{ $ujian->mahasiswa->nama }}</td>
                                            <td>{{ $ujian->mahasiswa->nim }}</td>
                                            <td class="text-start text-wrap">{{ $ujian->judul }}</td>
                                            <td>{{ $ujian->ipk_sementara }}</td>
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
