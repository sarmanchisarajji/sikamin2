@extends('layouts.main')
@section('main-contents')
<div class="content container-fluid">
   <div class="page-header">
      <div class="row">
         <div class="col-sm-12">
            <div class="page-sub-header">
               <h3 class="page-title">Monitoring Dosen</h3>
               <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="">Dosen</a></li>
                  <li class="breadcrumb-item active">Monitoring Dosen</li>
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
   <div class="row d-flex justify-content-between flex-wrap">
      <div class="card col-sm-12 py-3 px-3 d-flex flex-row gap-3" style="width: 32%">
        <div class="image bg-dark" style="width: 100px; border-radius: 9px"></div>
         <div>
            <h4>Nama Dosen</h4>
            <p class="badge badge-info rounded-pill" style="font-size: 14px">status</p>
            <h6 class="badge-primary px-2 rounded-pill text-white">Sebagai Pembimbing  : 10</h6>
            <div>
               <h6 class="badge-danger px-2 rounded-pill text-white">Sebagai Penguji: 15</h6>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection