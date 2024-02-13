@extends('layouts.main')
@section('main-contents')
   <div class="content container-fluid">
      <div class="page-header">
         <div class="row">
            <div class="col-sm-12">
               <div class="page-sub-header">
                  <h3 class="page-title">Welcome STAFF</h3>
                  <ul class="breadcrumb">
                     <li class="breadcrumb-item"><a href="">Home</a></li>
                     <li class="breadcrumb-item active">Student</li>
                  </ul>
               </div>
            </div>
         </div>
      </div>

      <div class="row">
         <div class="col-4">
            <div class="bg-comman w-100 mb-3">
               <div class="card-body">
                  <div class="db-widgets d-flex justify-content-between align-items-center">
                     <div class="db-info">
                        <h6>Total Mahasiswa</h6>
                        <h3>04/06</h3>
                     </div>
                     <div class="db-icon">
                        <img src="" alt="Dashboard Icon">
                     </div>
                  </div>
               </div>
            </div>
            <div class="bg-comman w-100">
               <div class="card-body">
                  <div class="db-widgets d-flex justify-content-between align-items-center">
                     <div class="db-info">
                        <h6>Total Dosen</h6>
                        <h3>04/06</h3>
                     </div>
                     <div class="db-icon">
                        <img src="{{ URL::to('assets/img/icons/teacher-icon-01.svg') }}" alt="Dashboard Icon">
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-4">
            <div class="bg-comman w-100 mb-3">
               <div class="card-body">
                  <div class="db-widgets d-flex justify-content-between align-items-center">
                     <div class="db-info">
                        <h6>Total Pengajuan Proposal</h6>
                        <h3>04/06</h3>
                     </div>
                     <div class="db-icon">
                        <img src="{{ URL::to('assets/img/icons/teacher-icon-01.svg') }}" alt="Dashboard Icon">
                     </div>
                  </div>
               </div>
            </div>
            <div class="bg-comman w-100">
               <div class="card-body">
                  <div class="db-widgets d-flex justify-content-between align-items-center">
                     <div class="db-info">
                        <h6>Total Pengajuan Hasil</h6>
                        <h3>04/06</h3>
                     </div>
                     <div class="db-icon">
                        <img src="{{ URL::to('assets/img/icons/teacher-icon-01.svg') }}" alt="Dashboard Icon">
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-4">
            <div class="bg-comman w-100 h-100">
               <div class="card-body">
                  <div class="db-widgets d-flex justify-content-between align-items-center">
                     <div class="db-info">
                        <h6>Total Pengajuan Skripsi</h6>
                        <h3>04/06</h3>
                     </div>
                     <div class="db-icon">
                        <img src="{{ URL::to('assets/img/icons/teacher-icon-01.svg') }}" alt="Dashboard Icon">
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <div class="row">
         
      </div>
   </div>
@endsection