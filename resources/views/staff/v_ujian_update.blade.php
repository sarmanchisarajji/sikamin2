@extends('layouts.main')
@section('main-contents')
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Verifikasi Ujian</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Mahasiswa</a></li>
                            <li class="breadcrumb-item active">Verifikasi Ujian</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card comman-shadow">
                    <div class="card-body">
                        <form action="{{ route('s-v_ujian-update', $ujian->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="col-12">
                                <h5 class="form-title student-info">Verifikasi Ujian</h5>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Nama Lengkap</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="nama"
                                        value="{{ $ujian->mahasiswa->nama }}" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">NIM</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="nim"
                                        value="{{ $ujian->mahasiswa->nim }}" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Judul Penelitian</label>
                                <div class="col-md-10">
                                    <textarea rows="5" cols="5" name="judul" class="form-control" disabled
                                        placeholder="Masukan Judul Penelitian">{{ $ujian->judul }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">IPK Sementara</label>
                                <div class="col-md-10">
                                    <input type="text" name="ipk_sementara" class="form-control"
                                        value="{{ old('ipk_sementara', $ujian->ipk_sementara) }}"
                                        placeholder="Masukan IPK Sementara">
                                </div>
                            </div>

                            <!-- Radio Buttons for Status -->
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Status</label>
                                <div class="col-md-10 d-flex align-items-center">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="statusDiterima"
                                            value="disetujui"
                                            {{ old('status', $ujian->status) == 'disetujui' ? 'checked' : ($ujian->status == 'diajukan' ? 'checked' : '') }}>
                                        <label class="form-check-label" for="statusDiterima"> <span
                                                class="px-3 rounded-pill text-white bg-info">
                                                Diterima</span></label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status"
                                            id="statusDikembalikan" value="dikembalikan"
                                            {{ old('status', $ujian->status) == 'dikembalikan' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="statusDikembalikan"><span
                                                class="px-3 rounded-pill text-white bg-danger">
                                                Dikembalikan</span></label>
                                    </div>
                                </div>
                            </div>

                            <!-- Conditional Fields based on Status -->
                            <div id="additionalFields">
                                <hr class="my-5">
                                <div class="row">
                                    <div class="col-md-12 col-12 d-flex flex-column flex-wrap">
                                        <div class="form-group local-forms">
                                            <label>Pembimbing 1 <span class="login-danger">*</span></label>
                                            <select class="form-control select" name="id_pembimbing_1">
                                                <option selected disabled>~ Pilih Pembimbing 1 ~</option>
                                                @foreach ($dosen as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ old('id_pembimbing_1', $ujian->id_pembimbing_1) == $item->id ? 'selected' : '' }}>
                                                        {{ $item->nama_dosen }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group local-forms">
                                            <label>Pembimbing 2 <span class="login-danger">*</span></label>
                                            <select class="form-control select" name="id_pembimbing_2">
                                                <option selected disabled>~ Pilih Pembimbing 2 ~</option>
                                                @foreach ($dosen as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ old('id_pembimbing_2', $ujian->id_pembimbing_2) == $item->id ? 'selected' : '' }}>
                                                        {{ $item->nama_dosen }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group local-forms">
                                            <label>Penguji 1 <span class="login-danger">*</span></label>
                                            <select class="form-control select" name="id_penguji_1">
                                                <option selected disabled>~ Pilih Penguji 1 ~</option>
                                                @foreach ($dosen as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ old('id_penguji_1', $ujian->id_penguji_1) == $item->id ? 'selected' : '' }}>
                                                        {{ $item->nama_dosen }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group local-forms">
                                            <label>Penguji 2 <span class="login-danger">*</span></label>
                                            <select class="form-control select" name="id_penguji_2">
                                                <option selected disabled>~ Pilih Penguji 2 ~</option>
                                                @foreach ($dosen as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ old('id_penguji_2', $ujian->id_penguji_2) == $item->id ? 'selected' : '' }}>
                                                        {{ $item->nama_dosen }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group local-forms">
                                            <label>Penguji 3 <span class="login-danger">*</span></label>
                                            <select class="form-control select" name="id_penguji_3">
                                                <option selected disabled>~ Pilih Penguji 3 ~</option>
                                                @foreach ($dosen as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ old('id_penguji_3', $ujian->id_penguji_3) == $item->id ? 'selected' : '' }}>
                                                        {{ $item->nama_dosen }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <hr class="mb-5">
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Tanggal Ujian</label>
                                    <div class="col-md-10">
                                        <input type="date" class="form-control"
                                            value="{{ old('tanggal_ujian', $ujian->tanggal_ujian) }}"
                                            name="tanggal_ujian">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Jam Ujian</label>
                                    <div class="col-md-10">
                                        <input type="time" class="form-control" name="jam_ujian"
                                            value="{{ old('jam_ujian', $ujian->jam_ujian) }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Tempat Ujian</label>
                                    <div class="col-md-10">
                                        <select class="form-control select" name="tempat_ujian">
                                            <option selected disabled>~ Pilih Tempat Ujian ~</option>
                                            <option value="jurusan"
                                                {{ old('tempat_ujian', $ujian->tempat_ujian) == 'jurusan' ? 'selected' : '' }}>
                                                Ruang Jurusan Teknik Informatika
                                            </option>
                                            <option value="lab_ai"
                                                {{ old('tempat_ujian', $ujian->tempat_ujian) == 'lab_ai' ? 'selected' : '' }}>
                                                Laboratorium CS & AI
                                            </option>
                                            <option value="lab_se"
                                                {{ old('tempat_ujian', $ujian->tempat_ujian) == 'lab_se' ? 'selected' : '' }}>
                                                Laboratorium Software Engineering
                                            </option>
                                            <option value="lab_jaringan"
                                                {{ old('tempat_ujian', $ujian->tempat_ujian) == 'lab_jaringan' ? 'selected' : '' }}>
                                                Laboratorium Komputasi Berbasis Jaringan
                                            </option>
                                            <option value="online"
                                                {{ old('tempat_ujian', $ujian->tempat_ujian) == 'online' ? 'selected' : '' }}>
                                                Online (Zoom/Google Meet)
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Catatan Field -->
                            <div id="catatanField" style="display: none;">
                                <hr class="my-5">
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Catatan</label>
                                    <div class="col-md-10">
                                        <textarea rows="5" cols="5" name="catatan" class="form-control" placeholder="Masukan Catatan">{{ old('catatan', $ujian->catatan) }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="student-submit">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const statusDiterima = document.getElementById('statusDiterima');
            const statusDikembalikan = document.getElementById('statusDikembalikan');
            const additionalFields = document.getElementById('additionalFields');
            const catatanField = document.getElementById('catatanField');

            function toggleFields() {
                if (statusDikembalikan.checked) {
                    additionalFields.style.display = 'none';
                    catatanField.style.display = 'block';
                } else {
                    additionalFields.style.display = 'block';
                    catatanField.style.display = 'none';
                }
            }

            statusDiterima.addEventListener('change', toggleFields);
            statusDikembalikan.addEventListener('change', toggleFields);

            // Initial check on page load
            toggleFields();
        });
    </script>
@endsection
