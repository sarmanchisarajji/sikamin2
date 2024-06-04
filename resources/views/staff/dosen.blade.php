@extends('layouts.main')
@section('main-contents')
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Kelola Data Dosen</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Dosen</a></li>
                            <li class="breadcrumb-item active">Data Dosen</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        {{-- message --}}
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table comman-shadow">
                    <div class="card-body">
                        <div class="page-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="page-title">Data Dosen</h3>
                                </div>
                                <div class="col-auto text-end float-end ms-auto download-grp">
                                    {{-- <a href="#" class="btn btn-outline-primary me-2"><i class="fas fa-download"></i>
                                        Download</a> --}}
                                    <a href="{{ route('s-dosen-create') }}" class="btn btn-primary"><i
                                            class="fas fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="example" class="display table table-hover table-striped" style="width:100%">
                                <thead class="student-thread">
                                    <tr class="text-center">
                                        <th style="background-color: #3d5ee1" class="text-white">No</th>
                                        <th style="background-color: #3d5ee1" class="text-white">Nama</th>
                                        <th style="background-color: #3d5ee1" class="text-white">NIP</th>
                                        <th style="background-color: #3d5ee1" class="text-white">NIDN</th>
                                        <th style="background-color: #3d5ee1" class="text-white">Jabatan</th>
                                        <th style="background-color: #3d5ee1" class="text-white">Status</th>
                                        <th style="background-color: #3d5ee1" class="text-white col-2">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($dosen as $key => $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->nama_dosen }}</td>
                                            <td>{{ $item->nip }}</td>
                                            <td>{{ $item->nidn }}</td>
                                            <td>{{ $item->jabatan_akademik }}</td>
                                            <td><span
                                                    class="{{ $item->status == 'aktif' ? 'bg-info' : 'bg-warning' }} text-white px-3 rounded-pill">{{ $item->status }}</span>
                                            </td>
                                            <td>
                                                <div>
                                                    <a href="{{ route('s-dosen-edit', $item->user->id) }}"
                                                        class="btn btn-sm bg-danger-light">
                                                        <i class="feather-edit"></i>
                                                    </a>
                                                    <form class="d-inline"
                                                        action="{{ route('s-dosen-delete', $item->user->id) }}"
                                                        method="POST" id="deleteDosen{{ $item->user->id }}">
                                                        @method('delete')
                                                        @csrf
                                                        <span>
                                                            <button type="button"
                                                                onclick="confirmDelete({{ $item->user->id }})"
                                                                class="btn btn-sm bg-danger-light" title="Hapus">
                                                                <i class="feather-trash-2 me-1"></i>
                                                            </button>
                                                        </span>
                                                    </form>
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
    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Konfirmasi',
                text: 'Apakah Anda yakin ingin menghapus?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal!',
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('deleteDosen' + id).submit();
                }
            });
        }
    </script>
@endsection
