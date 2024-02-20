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
   <div class="row d-flex justify-content-evenly flex-wrap gap-1">
      @foreach ($dosen as $item)
      <div class="card px-2 py-2 d-flex flex-row align-items-center gap-3 bg-white col-5">
         <img src="{{ asset('/assets/img/default-dosen.jpg') }}" alt="" width="150" style="border-radius: 6px">
         <div class="w-100">
            <p class="fs-5 fw-bold">{{ $item->nama_dosen }}</p>
            <p class="fw-bold text-secondary" style="margin-top: -20px">Teknik Informatika</p>
            <div class="d-flex justify-content-evenly px-3 py-1"
               style="border-radius: 6px; background-color: #e7ebee; margin-top: -10px">
               <div>
                  <p class="py-0 my-0">Penguji<br><span class="fs-5 fw-bold">102</span></p>
               </div>
               <div>
                  <span style="border: 1px solid black; display: inline-block; height: 100%"></span>
               </div>
               <div>
                  <p class="py-0 my-0">Pembimbing<br><span class="fs-5 fw-bold">36</span></p>
               </div>
            </div>
            <div class="mt-2">
               <a class="btn btn-primary w-100" href="">Lihat Detail</a>
            </div>
         </div>
      </div>
      @endforeach
   </div>
</div>
@endsection