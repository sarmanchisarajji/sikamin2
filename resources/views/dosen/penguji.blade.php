@extends('layouts.main')
@section('main-contents')
    <div class="content container-fluid">
        <div class="settings-menu-links">
            <ul class="nav nav-tabs menu-tabs">
                <li class="nav-item {{ request()->routeIs('d-mahasiswa_bimbingan') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('d-mahasiswa_bimbingan') }}">Bimbingan</a>
                </li>
                <li class="nav-item {{ request()->routeIs('d-mahasiswa_penguji') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('d-mahasiswa_penguji') }}">Penguji</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table comman-shadow">
                    <div class="card-body">
                        <div class="page-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="page-title">Mahasiswa Bimbingan</h3>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="example" class="display table table-hover table-striped" style="width:100%">
                                <thead class="student-thread">
                                    <tr class="text-center">
                                        <th style="background-color: #3d5ee1" class="text-white col-1">No</th>
                                        <th style="background-color: #3d5ee1" class="text-white col-3">Nama</th>
                                        <th style="background-color: #3d5ee1" class="text-white col-2">NIM</th>
                                        <th style="background-color: #3d5ee1" class="text-white col-4">Judul</th>
                                        <th style="background-color: #3d5ee1" class="text-white col-2">Jenis Ujian</th>
                                        <th style="background-color: #3d5ee1" class="text-white col-2">download</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($ujian as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->mahasiswa->nama }}</td>
                                            <td>{{ $item->mahasiswa->nim }}</td>
                                            <td>{{ $item->judul }}</td>
                                            <td>{{ $item->jenis_ujian }}</td>
                                            <td>
                                                <div class="dropdown dropdown-action fs-5">
                                                    <a href="#" class="action-icon dropdown-toggle"
                                                        data-bs-toggle="dropdown" aria-expanded="false"><i
                                                            class="fas fa-ellipsis-h"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-end fs-6">
                                                        @if ($item->jenis_ujian == 'proposal' || $item->jenis_ujian == 'hasil')
                                                            <a class="dropdown-item py-2 {{ !$item->ba ? 'disabled' : '' }}"
                                                                href="{{ asset('storage/' . $item->jenis_ujian . '/' . $item->mahasiswa->nama . '/' . $item->ba) }}"
                                                                download>
                                                                Berita Acara
                                                            </a>
                                                            <a class="dropdown-item py-2 {{ !$item->undangan ? 'disabled' : '' }}"
                                                                href="{{ asset('storage/' . $item->jenis_ujian . '/' . $item->mahasiswa->nama . '/' . $item->undangan) }}"
                                                                download>
                                                                Undangan {{ ucwords($item->jenis_ujian) }}
                                                            </a>
                                                            @if ($item->jenis_ujian == 'proposal')
                                                                <a class="dropdown-item py-2 {{ !$item->sk_dekan ? 'disabled' : '' }}"
                                                                    href="{{ asset("storage/$item->sk_dekan") }}" download>
                                                                    SK Dekan
                                                                </a>
                                                            @endif
                                                        @endif
                                                        @if ($item->jenis_ujian == 'skripsi')
                                                            <a class="dropdown-item py-2 {{ !$item->sk_pembimbing ? 'disabled' : '' }}"
                                                                href="{{ asset('storage/' . $item->jenis_ujian . '/' . $item->mahasiswa->nama . '/' . $item->sk_pembimbing) }}"
                                                                download>
                                                                SK Pembimbing
                                                            </a>
                                                            <a class="dropdown-item py-2 {{ !$item->sk_penguji ? 'disabled' : '' }}"
                                                                href="{{ asset('storage/' . $item->jenis_ujian . '/' . $item->mahasiswa->nama . '/' . $item->sk_penguji) }}"
                                                                download>
                                                                SK Penguji
                                                            </a>
                                                            <a class="dropdown-item py-2 {{ !$item->ba ? 'disabled' : '' }}"
                                                                href="{{ asset('storage/' . $item->jenis_ujian . '/' . $item->mahasiswa->nama . '/' . $item->ba) }}"
                                                                download>
                                                                Berita Acara
                                                            </a>
                                                            <a class="dropdown-item py-2 {{ !$item->undangan ? 'disabled' : '' }}"
                                                                href="{{ asset('storage/' . $item->jenis_ujian . '/' . $item->mahasiswa->nama . '/' . $item->undangan) }}"
                                                                download>
                                                                Undangan Skripsi
                                                            </a>
                                                            <a class="dropdown-item py-2 {{ !$item->lembar_penilaian ? 'disabled' : '' }}"
                                                                href="{{ asset('storage/' . $item->jenis_ujian . '/' . $item->mahasiswa->nama . '/' . $item->lembar_penilaian) }}"
                                                                download>
                                                                Lembar Penilaian
                                                            </a>
                                                            <a class="dropdown-item py-2 {{ !$item->sk_dekan ? 'disabled' : '' }}"
                                                                href="{{ asset("storage/$item->sk_dekan") }}" download>
                                                                SK Dekan
                                                            </a>
                                                        @endif
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
