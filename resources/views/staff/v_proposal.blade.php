@extends('layouts.main')
@section('main-contents')
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Verifikasi Ujian</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Verifikasi Ujian</a></li>
                            <li class="breadcrumb-item active">Proposal</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="settings-menu-links">
            <ul class="nav nav-tabs menu-tabs d-flex">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('s-v_proposal-index') }}">Proposal</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{ route('s-v_hasil-index') }}">Hasil</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{ route('s-v_skripsi-index') }}">Skripsi</a>
                </li>
            </ul>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table comman-shadow">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display table table-hover table-striped" style="width:100%">
                                <thead class="student-thread">
                                    <tr class="text-center">
                                        <th style="background-color: #3d5ee1" class="text-white col-1">No</th>
                                        <th style="background-color: #3d5ee1" class="text-white col-2">Nama Lengkap</th>
                                        <th style="background-color: #3d5ee1" class="text-white col-2">NIM</th>
                                        <th style="background-color: #3d5ee1" class="text-white col-3">Judul</th>
                                        <th style="background-color: #3d5ee1" class="text-white col-2">Status</th>
                                        <th style="background-color: #3d5ee1" class="text-white col-1">Action</th>
                                        <th style="background-color: #3d5ee1" class="text-white col-1">Draft</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($proposal as $key => $item)
                                        <tr class="text-center">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->mahasiswa->nama }}</td>
                                            <td>{{ $item->mahasiswa->nim }}</td>
                                            <td>{{ $item->judul }}</td>
                                            <td><span
                                                    class="px-3 rounded-pill text-white {{ $item->status == 'diajukan' ? 'bg-warning' : ($item->status == 'dikembalikan' ? 'bg-danger' : 'bg-info') }}">{{ $item->status }}</span>
                                            </td>
                                            <td class="d-flex flex-column">
                                                <div class="mb-1">
                                                    <a href="{{ route('s-bukti_dukung', ['id' => $item->id]) }}"
                                                        class="btn btn-sm text-white"
                                                        style="background-color: rgb(14, 156, 128)">Bukti
                                                        Dukung</a>
                                                </div>
                                                <div>
                                                    @if ($item->status == 'diajukan')
                                                        <a href="{{ route('s-v_ujian_form', $item->id) }}"
                                                            class="btn btn-sm text-white"
                                                            style="background-color: rgb(203, 135, 0)">Verifikasi</a>
                                                    @elseif ($item->status == 'dikembalikan')
                                                        <a href="{{ route('s-v_ujian_form', $item->id) }}"
                                                            class="btn btn-sm text-white"
                                                            style="background-color: red">Dikembalikan</a>
                                                    @else
                                                        <a href="{{ route('s-v_ujian_form', $item->id) }}"
                                                            class="btn btn-sm text-white"
                                                            style="background-color: blue">Terverifikasi</a>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <div class="dropdown dropdown-action fs-5">
                                                    <a href="#" class="action-icon dropdown-toggle"
                                                        data-bs-toggle="dropdown" aria-expanded="false"><i
                                                            class="fas fa-ellipsis-h"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-end fs-6">
                                                        <a class="dropdown-item py-2 {{ $item->status != 'disetujui' ? 'disabled' : '' }}"
                                                            href="{{ route('s-berita_acara_proposal', $item->id) }}">
                                                            Berita Acara
                                                        </a>
                                                        <a class="dropdown-item py-2 {{ $item->status != 'disetujui' ? 'disabled' : '' }}"
                                                            href="{{ route('s-undangan_proposal', $item->id) }}">
                                                            Undangan Proposal
                                                        </a>
                                                    </div>
                                                </div>
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
