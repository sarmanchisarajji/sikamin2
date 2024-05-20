@extends('layouts.main')
@section('main-contents')
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Welcome {{ Auth::user()->nama_pengguna }}!</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/mahasiswa/dashboard">Home</a></li>
                            <li class="breadcrumb-item active">Mahasiswa</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <div class="card-body">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h5>
                                    <a href="{{ url(Auth::user()->user_type . '/profil') }}"
                                        style="text-decoration: none; color: inherit;"
                                        onmouseover="this.style.color='blue'; this.style.textDecoration='underline';"
                                        onmouseout="this.style.color='inherit'; this.style.textDecoration='none';">
                                        Data Profil
                                    </a>
                                </h5>
                            </div>
                            <div class="db-icon">
                                <img src="{{ asset('') }}assets/img/dash-icon-01.svg" alt="Dashboard Icon">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <div class="card-body">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6>Status Ujian Saat Ini</h6>
                                @php
                                    if ($ujian) {
                                        $ujian = Str::ucfirst($ujian->jenis_ujian);
                                    } else {
                                        $ujian = 'Belum Mengajukan Ujian';
                                    }
                                @endphp
                                <h5>
                                    <a href="{{ url(Auth::user()->user_type . '/pengajuan-ujian') }}"
                                        style="text-decoration: none; color: inherit;"
                                        onmouseover="this.style.color='blue'; this.style.textDecoration='underline';"
                                        onmouseout="this.style.color='inherit'; this.style.textDecoration='none';">
                                        {{ $ujian }}
                                    </a>
                                </h5>
                            </div>
                            <div class="db-icon">
                                <img src="{{ asset('') }}assets/img/dash-icon-02.svg" alt="Dashboard Icon">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
