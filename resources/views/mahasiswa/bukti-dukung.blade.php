@extends('layouts.main')
@section('main-contents')
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Kelola Data Ujian</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/mahasiswa/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="/mahasiswa/pengajuan-ujian">Pengajuan Ujian</a></li>
                            <li class="breadcrumb-item active">Bukti Pendukung</li>
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
                                    <h3 class="page-title">Data Bukti Pendukung</h3>
                                </div>
                                <div class="col-auto text-end float-end ms-auto download-grp">
                                    <button class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#tambahBuktiModal">
                                        <i class="fas fa-plus"></i> File Bukti Pedukung
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="example" class="display datatable table table-hover table-striped">
                                <thead class="student-thread">
                                    <tr class="text-center">
                                        <th style="width: 30px">No</th>
                                        <th style="width: 100px">Action</th>
                                        <th>Nama Berkas</th>
                                        <th>File</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($buktis as $bukti)
                                        <tr class="text-center">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <span><button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                                        data-bs-target="#editBuktiModal{{ $bukti->id }}" title="Edit">
                                                        <i class="fas fa-edit"></i></button></span>
                                                <form class="d-inline"
                                                    action="{{ url("mahasiswa/pengajuan-ujian/bukti-dukung/$id_ujian/delete/$bukti->id") }}"
                                                    method="POST">
                                                    @method('delete')
                                                    @csrf
                                                    <span><button onclick="return confirm('Lanjutkan untuk menghapus?')"
                                                            type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                                            <i class="fas  fa-trash"></i></button></span>
                                                </form>
                                            </td>
                                            <td class="text-start text-wrap">{{ $bukti->nama_berkas }}</td>
                                            <td>
                                                <a href="{{ asset("storage/$bukti->file") }}"><button
                                                        class="btn btn-sm btn-success"><i class="fas fa-file"></i>
                                                        {{ Str::limit($bukti->nama_berkas, 30) }}</button></a>
                                            </td>
                                        </tr>

                                        {{-- Modal Edit --}}
                                        <div id="editBuktiModal{{ $bukti->id }}" class="modal fade" tabindex="-1"
                                            role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
                                            style="display: none;">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Update File Berkas</h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body p-4">
                                                        <form
                                                            action="{{ url("mahasiswa/pengajuan-ujian/bukti-dukung/$id_ujian/update/$bukti->id") }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            @method('PUT')
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="nama_berkas" class="form-label">Nama
                                                                            Berkas</label>
                                                                        <input type="text" name="nama_berkas"
                                                                            @error('nama_berkas') is-invalid @enderror
                                                                            class="form-control" id="nama_berkas"
                                                                            placeholder="Masukan Nama Berkas"
                                                                            value="{{ old('nama_berkas', $bukti->nama_berkas) }}"
                                                                            required>
                                                                        @error('nama_berkas')
                                                                            <div class="invalid-feedback">{{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="file" class="form-label">Unggah
                                                                            File</label>
                                                                        <input type="file" name="file"
                                                                            @error('file') is-invalid @enderror
                                                                            class="form-control" id="file"
                                                                            placeholder="Unggah File"
                                                                            accept=".doc, .docx, .xls, .xlsx, .pdf">
                                                                        @error('file')
                                                                            <div class="invalid-feedback">{{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary waves-effect"
                                                            data-bs-dismiss="modal">Batal</button>
                                                        <button type="submit"
                                                            class="btn btn-info waves-effect waves-light">Simpan</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>

                            {{-- Modal Add --}}
                            <div id="tambahBuktiModal" class="modal fade" tabindex="-1" role="dialog"
                                aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Tambah Bukti Pendukung</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body p-4">
                                            <form
                                                action="{{ url("mahasiswa/pengajuan-ujian/bukti-dukung/$id_ujian/store") }}"
                                                method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="nama_berkas" class="form-label">Nama
                                                                Berkas</label>
                                                            <input type="text" name="nama_berkas"
                                                                @error('nama_berkas') is-invalid @enderror
                                                                class="form-control" id="nama_berkas"
                                                                placeholder="Masukan Nama Berkas" required>
                                                            @error('nama_berkas')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="file" class="form-label">Unggah File</label>
                                                            <input type="file" name="file"
                                                                @error('file') is-invalid @enderror class="form-control"
                                                                id="file" placeholder="Unggah File" required
                                                                accept=".doc, .docx, .xls, .xlsx, .pdf">
                                                            @error('file')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary waves-effect"
                                                data-bs-dismiss="modal">Batal</button>
                                            <button type="submit"
                                                class="btn btn-info waves-effect waves-light">Simpan</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
