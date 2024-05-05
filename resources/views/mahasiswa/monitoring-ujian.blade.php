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
                @foreach ($ujians as $ujian)
                    <div class="card card-table common-shadow"
                        style="border-left: 7px solid 
                        @if ($ujian->jenis_ujian == 'proposal') #007bff;
                        @elseif ($ujian->jenis_ujian == 'hasil')
                            #28a745;
                        @else #dc3545; /* Merah */ @endif">
                        <div class="card-body">
                            <h3>{{ $ujian->judul }}</h3>
                            <p>
                                <span class="ml-2">Jenis Ujian : </span>
                                <span
                                    class="badge 
                                    @if ($ujian->jenis_ujian == 'proposal') badge-primary
                                    @elseif ($ujian->jenis_ujian == 'hasil')
                                        badge-success
                                    @else
                                        badge-info @endif">
                                    @if ($ujian->jenis_ujian == 'proposal')
                                        Proposal
                                    @elseif ($ujian->jenis_ujian == 'hasil')
                                        Hasil
                                    @else
                                        Skripsi
                                    @endif
                                </span>
                            </p>
                            <p>Tanggal Ujian: {{ \Carbon\Carbon::parse($ujian->tanggal_ujian)->format('d F Y') }}</p>
                            <p>Jam Ujian: {{ \Carbon\Carbon::parse($ujian->jam_ujian)->format('h:i A') }}</p>
                            <p>Tanggal Daftar: {{ \Carbon\Carbon::parse($ujian->created_at)->format('d F Y') }}</p>
                            <p>Berkas Ujian:
                                @if ($ujian->status == 'diajukan')
                                    <button class="btn btn-sm btn-danger mx-1 my-1">
                                        Belum Diverifikasi
                                    </button>
                                @else
                                    @if ($ujian->jenis_ujian == 'proposal')
                                        <button class="btn btn-sm btn-success mx-1 my-1" data-bs-toggle="modal"
                                            data-bs-target="#bs-example-modal-lg-berita-acara-{{ $ujian->jenis_ujian }}-{{ $ujian->id }}">
                                            Berita Acara
                                        </button>
                                        <button class="btn btn-sm btn-warning mx-1 my-1" data-bs-toggle="modal"
                                            data-bs-target="#bs-example-modal-lg-undangan-{{ $ujian->jenis_ujian }}-{{ $ujian->id }}">Undangan
                                            Proposal</button>
                                    @elseif ($ujian->jenis_ujian == 'hasil')
                                        <button class="btn btn-sm btn-success mx-1 my-1" data-bs-toggle="modal"
                                            data-bs-target="#bs-example-modal-lg-berita-acara-{{ $ujian->jenis_ujian }}-{{ $ujian->id }}">
                                            Berita Acara
                                        </button>
                                        <button class="btn btn-sm btn-warning mx-1 my-1" data-bs-toggle="modal"
                                            data-bs-target="#bs-example-modal-lg-undangan-{{ $ujian->jenis_ujian }}-{{ $ujian->id }}">Undangan
                                            Proposal</button>
                                    @elseif($ujian->jenis_ujian == 'skripsi')
                                        <button class="btn btn-sm btn-success mx-1 my-1" data-bs-toggle="modal"
                                            data-bs-target="#bs-example-modal-lg-berita-acara-{{ $ujian->jenis_ujian }}-{{ $ujian->id }}">
                                            Berita Acara
                                        </button>
                                        <button class="btn btn-sm btn-warning mx-1 my-1" data-bs-toggle="modal"
                                            data-bs-target="#bs-example-modal-lg-undangan-{{ $ujian->jenis_ujian }}-{{ $ujian->id }}">Undangan
                                            Proposal</button>
                                        <button class="btn btn-sm btn-info mx-1 my-1" data-bs-toggle="modal"
                                            data-bs-target="#bs-example-modal-lg-skpembimbing-{{ $ujian->jenis_ujian }}-{{ $ujian->id }}">SK
                                            Pembimbing</button>
                                        <button class="btn btn-sm btn-primary mx-1 my-1" data-bs-toggle="modal"
                                            data-bs-target="#bs-example-modal-lg-skpenguji-{{ $ujian->jenis_ujian }}-{{ $ujian->id }}">SK
                                            Penguji</button>
                                        <button class="btn btn-sm btn-secondary mx-1 my-1" data-bs-toggle="modal"
                                            data-bs-target="#bs-example-modal-lg-penilaian-{{ $ujian->jenis_ujian }}-{{ $ujian->id }}">Lembar
                                            Penilaian</button>
                                    @endif
                                @endif
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @foreach ($ujians as $ujian)
            @if ($ujian->jenis_ujian == 'proposal')
                <div class="modal fade"
                    id="bs-example-modal-lg-berita-acara-{{ $ujian->jenis_ujian }}-{{ $ujian->id }}" tabindex="-1"
                    role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myLargeModalLabel">Large modal</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="col-md-12 col-12 bg-white p-4">
                                    <iframe id="file-iframe" src="{{ route('surat_berita_acara_mahasiswa', $ujian->id) }}"
                                        align="top" height="800" width="100%" frameborder="0"
                                        scrolling="auto"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="bs-example-modal-lg-undangan-{{ $ujian->jenis_ujian }}-{{ $ujian->id }}"
                    tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myLargeModalLabel">Large modal</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="col-md-12 col-12 bg-white p-4">
                                    <iframe id="file-iframe" src="{{ route('surat_undangan_mahasiswa', $ujian->id) }}"
                                        align="top" height="800" width="100%" frameborder="0"
                                        scrolling="auto"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @elseif ($ujian->jenis_ujian == 'hasil')
                <div class="modal fade"
                    id="bs-example-modal-lg-berita-acara-{{ $ujian->jenis_ujian }}-{{ $ujian->id }}" tabindex="-1"
                    role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myLargeModalLabel">Large modal</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="col-md-12 col-12 bg-white p-4">
                                    <iframe id="file-iframe"
                                        src="{{ route('surat_berita_acara_mahasiswa', $ujian->id) }}" align="top"
                                        height="800" width="100%" frameborder="0" scrolling="auto"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="bs-example-modal-lg-undangan-{{ $ujian->jenis_ujian }}-{{ $ujian->id }}"
                    tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myLargeModalLabel">Large modal</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="col-md-12 col-12 bg-white p-4">
                                    <iframe id="file-iframe" src="{{ route('surat_undangan_mahasiswa', $ujian->id) }}"
                                        align="top" height="800" width="100%" frameborder="0"
                                        scrolling="auto"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @elseif ($ujian->jenis_ujian == 'skripsi')
                <div class="modal fade"
                    id="bs-example-modal-lg-berita-acara-{{ $ujian->jenis_ujian }}-{{ $ujian->id }}" tabindex="-1"
                    role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myLargeModalLabel">Large modal</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="col-md-12 col-12 bg-white p-4">
                                    <iframe id="file-iframe"
                                        src="{{ route('surat_berita_acara_mahasiswa', $ujian->id) }}" align="top"
                                        height="800" width="100%" frameborder="0" scrolling="auto"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="bs-example-modal-lg-undangan-{{ $ujian->jenis_ujian }}-{{ $ujian->id }}"
                    tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myLargeModalLabel">Large modal</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="col-md-12 col-12 bg-white p-4">
                                    <iframe id="file-iframe" src="{{ route('surat_undangan_mahasiswa', $ujian->id) }}"
                                        align="top" height="800" width="100%" frameborder="0"
                                        scrolling="auto"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade"
                    id="bs-example-modal-lg-skpembimbing-{{ $ujian->jenis_ujian }}-{{ $ujian->id }}" tabindex="-1"
                    role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myLargeModalLabel">Large modal</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="col-md-12 col-12 bg-white p-4">
                                    <iframe id="file-iframe" src="{{ route('sk_pembimbing_mahasiswa', $ujian->id) }}"
                                        align="top" height="800" width="100%" frameborder="0"
                                        scrolling="auto"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="bs-example-modal-lg-skpenguji-{{ $ujian->jenis_ujian }}-{{ $ujian->id }}"
                    tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myLargeModalLabel">Large modal</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="col-md-12 col-12 bg-white p-4">
                                    <iframe id="file-iframe" src="{{ route('sk_penguji_mahasiswa', $ujian->id) }}"
                                        align="top" height="800" width="100%" frameborder="0"
                                        scrolling="auto"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="bs-example-modal-lg-penilaian-{{ $ujian->jenis_ujian }}-{{ $ujian->id }}"
                    tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myLargeModalLabel">Large modal</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="col-md-12 col-12 bg-white p-4">
                                    <iframe id="file-iframe" src="{{ route('lembar_penilaian_mahasiswa', $ujian->id) }}"
                                        align="top" height="800" width="100%" frameborder="0"
                                        scrolling="auto"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
@endsection
