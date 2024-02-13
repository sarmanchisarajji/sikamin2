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
   <div class="student-group-form">
      <div class="row">
         <div class="col-lg-10 col-md-10">
            <div class="form-group">
               <input type="text" class="form-control" placeholder="Cari">
            </div>
         </div>
         <div class="col-lg-2">
            <div class="search-student-btn">
               <button type="btn" class="btn btn-primary">Cari</button>
            </div>
         </div>
      </div>
   </div>
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
                        <a href="#" class="btn btn-outline-primary me-2"><i class="fas fa-download"></i>
                           Download</a>
                        <a href="{{ route('s-dosen-create') }}" class="btn btn-primary"><i
                              class="fas fa-plus"></i></a>
                     </div>
                  </div>
               </div>

               <div class="table-responsive">
                  <table class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                     <thead class="student-thread">
                        <tr class="text-center">
                           <th>No</th>
                           <th>Nama</th>
                           <th>NIP</th>
                           <th>NIDN</th>
                           <th>Status</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody class="text-center">
                        @foreach ($dosen as $key => $item)
                        <tr>
                           <td>{{ $loop->iteration }}</td>
                           <td>{{ $item->nama_dosen }}</td>
                           <td>{{ $item->nip }}</td>
                           <td>{{ $item->nidn }}</td>
                           <td><span>{{ $item->status }}</span></td>
                           <td>
                              <div>
                                 <a href="{{ url('dosen/edit/'.$item->id) }}" class="btn btn-sm bg-danger-light">
                                    <i class="feather-edit"></i>
                                 </a>
                                 <a class="btn btn-sm bg-danger-light student_delete" data-bs-toggle="modal"
                                    data-bs-target="#studentUser">
                                    <i class="feather-trash-2 me-1"></i>
                                 </a>
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