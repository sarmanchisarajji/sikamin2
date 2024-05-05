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
            <div class="card card-table comman-shadow" style="border-inline-start: 7px solid 
                @if ($ujian->jenis_ujian == 'proposal')
                    blue;
                @elseif ($ujian->jenis_ujian == 'hasil')
                    green;
                @else
                    red;
                @endif">
                <div class="card-body">
                    <h3>{{ $ujian->judul }}</h3>
                    <p> Jenis Ujian 
                        @if ($ujian->jenis_ujian == 'proposal')
                    <div class="badge badge-soft-primary">Proposal</div>
                    @elseif ($ujian->jenis_ujian == 'hasil')
                    <div class="badge badge-soft-secondary">Hasil</div>
                    @else
                    <div class="badge badge-soft-success">Skripsi</div>
                    @endif
                    </p>
                    <p>Tanggal Ujian : {{ \Carbon\Carbon::parse($ujian->tanggal_ujian)->format('d F Y') }}</p>
                    <p>Jam Ujian : {{ \Carbon\Carbon::parse($ujian->jam_ujian)->format('h:i A') }}</p>
                    <p>Tanggal Daftar : {{ \Carbon\Carbon::parse($ujian->created_at)->format('d F Y') }}</p>
                    <p>Berkas Ujian :
                        @if($ujian->jenis_ujian == 'proposal')
                        <button class="btn-sm btn-success mx-1 my-1">Berita Acara</button>
                        <button class="btn-sm btn-warning mx-1 my-1">Undangan Proposal</button>
                        @elseif ($ujian->jenis_ujian == 'hasil')
                        <button class="btn-sm btn-success mx-1 my-1">Berita Acara</button>
                        <button class="btn-sm btn-warning mx-1 my-1">Undangan Proposal</button>
                        @elseif ($ujian->jenis_ujian == 'skripsi')
                        <button class="btn-sm btn-success mx-1 my-1">Berita Acara</button>
                        <button class="btn-sm btn-warning mx-1 my-1">Undangan Proposal</button>
                        <button class="btn-sm btn-info mx-1 my-1">SK Pembimbing</button>
                        <button class="btn-sm btn-primary mx-1 my-1">SK Penguji</button>
                        <button class="btn-sm btn-secondary mx-1 my-1">Lembar Penilaian</button>
                        @endif
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection