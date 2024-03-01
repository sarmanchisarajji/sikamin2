@extends('layouts.main')
@section('main-contents')
    {{-- message --}}
    {!! Toastr::message() !!}
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Mahasiswa Bimbingan</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Dosen</a></li>
                            <li class="breadcrumb-item active">Mahasiswa Bimbingan</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table">
                        <div class="card-body">
                            <div class="page-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h3 class="page-title">List Mahasiswa Bimbingan</h3>
                                    </div>
                                    <div class="col-auto text-end float-end ms-auto download-grp">
                                        <a href="dosen/mahasiswabimbingan/list/page" class="btn btn-outline-gray me-2 active">
                                            <i class="fa fa-list" aria-hidden="true"></i>
                                        <a href="#" class="btn btn-outline-gray me-2">
                                            <i class="fa fa-th" aria-hidden="true"></i>
                                        <a href="#" class="btn btn-outline-primary me-2"><i
                                                class="fas fa-download"></i> Download</a>
                                    </div>
                                </div>
                            </div>
    
                            <div class="table-responsive">
                                <table id="DataList" class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                                    <thead class="student-thread"> 
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>NIM</th>
                                            <th>Tahun Masuk</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($listBimbingan as $key => $mahasiswa)
                                        <tr>
                                            <td hidden class="id_user">{{ $mahasiswa->id_user }}</td>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $mahasiswa->nama }}</td>
                                            <td>{{ $mahasiswa->nim }}</td>
                                            <td>{{ $mahasiswa->tahun_masuk }}</td>
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
@section('script')
@endsection
@endsection
