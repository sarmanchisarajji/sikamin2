@extends('layouts.main')
@section('main-contents')
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">
                        @if (isset($ujian))
                            Edit
                        @else
                            Tambah
                        @endif Data Ujian
                    </h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/mahasiswa/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/mahasiswa/dashboard/pengajuan-ujian">Pengajuan Ujian</a></li>
                        <li class="breadcrumb-item active">
                            @if (isset($ujian))
                                Edit
                            @else
                                Tambah
                            @endif Ujian
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                @if (session('success'))
                    @include('mahasiswa.components.alert-success', ['message' => session('success')])
                @endif
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Input Data Ujian</h5>
                    </div>
                    <div class="card-body">
                        <form
                            @if (isset($ujian)) action="{{ url("mahasiswa/pengajuan-ujian/update/$ujian->id") }}"
                            @else action="{{ url('mahasiswa/pengajuan-ujian/store') }}" @endif
                            method="POST">
                            @if (isset($ujian))
                                @method('PUT')
                                <input type="hidden" name="id" value="{{ $ujian->id }}">
                            @endif
                            @csrf
                            <input type="hidden" name="id_mahasiswa" value="{{ $mahasiswa->id }}">
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Nama Lengkap</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" value="{{ $mahasiswa->nama }}"
                                        disabled="disabled">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">NIM</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" value="{{ $mahasiswa->nim }}"
                                        disabled="disabled">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Judul Penelitian</label>
                                <div class="col-md-10">
                                    <textarea rows="5" cols="5" name="judul" class="form-control" placeholder="Masukan Judul Penelitian"
                                        @error('judul') is-invalid @enderror required>{{ isset($ujian) ? $ujian->judul : old('judul', '') }}</textarea>
                                </div>
                                @error('judul')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">IPK Sementara</label>
                                <div class="col-md-10">
                                    <input type="text" name="ipk_sementara" class="form-control"
                                        @error('ipk_sementara') is-invalid @enderror placeholder="Masukan IPK Sementara"
                                        value="{{ isset($ujian) ? $ujian->ipk_sementara : old('ipk_sementara', '') }}"
                                        required>
                                </div>
                                @error('ipk_sementara')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Jenis Ujian</label>
                                <div class="col-md-10">
                                    <select name="jenis_ujian"
                                        class="form-control form-select @error('jenis_ujian') is-invalid @enderror"
                                        required>
                                        <option value="">~ Pilih Jenis Ujian ~</option>
                                        <option value="proposal"
                                            {{ old('jenis_ujian') == 'proposal' || (isset($ujian) && $ujian->jenis_ujian == 'proposal') ? 'selected' : '' }}>
                                            Ujian Proposal
                                        </option>
                                        <option value="hasil"
                                            {{ old('jenis_ujian') == 'hasil' || (isset($ujian) && $ujian->jenis_ujian == 'hasil') ? 'selected' : '' }}>
                                            Ujian Hasil
                                        </option>
                                        <option value="skripsi"
                                            {{ old('jenis_ujian') == 'skripsi' || (isset($ujian) && $ujian->jenis_ujian == 'skripsi') ? 'selected' : '' }}>
                                            Ujian Skripsi
                                        </option>
                                    </select>
                                    @error('jenis_ujian')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Pembimbing 1</label>
                                <div class="col-md-10">
                                    <select name="id_pembimbing_1"
                                        class="form-control form-select @error('id_pembimbing_1') is-invalid @enderror"
                                        required>
                                        <option value="">~ Pilih Dosen ~</option>
                                        @foreach ($dosens as $dosen)
                                            <option value="{{ $dosen->id }}"
                                                {{ old('id_pembimbing_1') == $dosen->id || (isset($ujian) && $ujian->id_pembimbing_1 == $dosen->id) ? 'selected' : '' }}>
                                                {{ $dosen->nama_dosen }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('id_pembimbing_1')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Pembimbing 2</label>
                                <div class="col-md-10">
                                    <select name="id_pembimbing_2"
                                        class="form-control form-select @error('id_pembimbing_2') is-invalid @enderror"
                                        required>
                                        <option value="">~ Pilih Dosen ~</option>
                                        @foreach ($dosens as $dosen)
                                            <option value="{{ $dosen->id }}"
                                                {{ old('id_pembimbing_2') == $dosen->id || (isset($ujian) && $ujian->id_pembimbing_2 == $dosen->id) ? 'selected' : '' }}>
                                                {{ $dosen->nama_dosen }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('id_pembimbing_2')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="text-center mt-5 col-md-12">
                                <button type="submit" class="btn btn-primary">
                                    @if (isset($ujian))
                                        Simpan Perubahan
                                    @else
                                        Submit Ujian
                                    @endif
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
