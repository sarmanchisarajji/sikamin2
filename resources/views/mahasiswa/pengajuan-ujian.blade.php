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
                            <li class="breadcrumb-item active">Management Ujian</li>
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
                            <table id="example" class="display datatable table table-hover table-striped">
                                <thead class="student-thread">
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Action</th>
                                        <th>Jenis Ujian</th>
                                        <th>Nama Lengkap</th>
                                        <th>NIM</th>
                                        <th>Judul</th>
                                        <th>IPK Sementara</th>
                                        <th>Berkas Pendukung</th>
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
                                                <div class="mt-1"><button class="btn btn-sm btn-success"
                                                        title="Tambah Berkas Pendukung" data-bs-toggle="modal"
                                                        data-bs-target="#berkasModal{{ $ujian->id }}">
                                                        Bukti Dukung</button></div>
                                            </td>
                                            <td>
                                                @if ($ujian->jenis_ujian == 'proposal')
                                                    <span class="badge badge-soft-primary">Proposal</span>
                                                @elseif ($ujian->jenis_ujian == 'hasil')
                                                    <span class="badge badge-soft-secondary">Hasil</span>
                                                @else
                                                    <span class="badge badge-soft-success">Skripsi</span>
                                                @endif
                                            </td>
                                            <td>{{ $ujian->mahasiswa->nama }}</td>
                                            <td>{{ $ujian->mahasiswa->nim }}</td>
                                            <td class="text-start">{{ $ujian->judul }}</td>
                                            <td>{{ $ujian->ipk_sementara }}</td>
                                            <td>Berkasss</td>
                                        </tr>

                                        {{-- Modal Berkas Pendukung --}}
                                        <div id="berkasModal{{ $ujian->id }}" class="modal fade" tabindex="-1"
                                            role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
                                            style="display: none;">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Modal Content is Responsive</h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body p-4">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label for="field-1" class="form-label">Name</label>
                                                                    <input type="text" class="form-control"
                                                                        id="field-1" placeholder="John">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label for="field-2" class="form-label">Surname</label>
                                                                    <input type="text" class="form-control"
                                                                        id="field-2" placeholder="Doe">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="mb-3">
                                                                    <label for="field-3" class="form-label">Address</label>
                                                                    <input type="text" class="form-control"
                                                                        id="field-3" placeholder="Address">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label for="field-4" class="form-label">City</label>
                                                                    <input type="text" class="form-control"
                                                                        id="field-4" placeholder="Boston">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label for="field-5"
                                                                        class="form-label">Country</label>
                                                                    <input type="text" class="form-control"
                                                                        id="field-5" placeholder="United States">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label for="field-6" class="form-label">Zip</label>
                                                                    <input type="text" class="form-control"
                                                                        id="field-6" placeholder="123456">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="">
                                                                    <label for="field-7" class="form-label">Personal
                                                                        Info</label>
                                                                    <textarea class="form-control" id="field-7" placeholder="Write something about yourself"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary waves-effect"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="button"
                                                            class="btn btn-info waves-effect waves-light">Save
                                                            changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
