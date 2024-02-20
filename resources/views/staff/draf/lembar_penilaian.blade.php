@extends('layouts.main')
@section('main-contents')
<div class="content container-fluid mb-4">
   <div class="page-header">
      <div class="row">
         <div class="col-sm-12">
            <div class="page-sub-header">
               <h3 class="page-title">Draft</h3>
               <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('s-v_proposal-index') }}">Verifikasi Ujian</a></li>
                  <li class="breadcrumb-item active">Proposal</li>
                  <li class="breadcrumb-item active">Draft</li>
                  <li class="breadcrumb-item active">Lembar penilaian</li>
               </ul>
            </div>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-11 mx-auto">
         <ul class="d-flex justify-content-center gap-5 align-items-center py-3">
            <li>
               <a href="" class="file-link px-3 py-3"
                  style="display: inline-block; width: 100%; border: 1px solid #3d5ee1">Surat
                  Penunjukkan Pembimbing</a>
            </li>
            <li>
               <a href="" class="file-link px-3 py-3"
                  style="display: inline-block; width: 100%; border: 1px solid #3d5ee1">Surat Tugas
                  Ujian</a>
            </li>
            <li>
               <a href="" class="file-link px-3 py-3"
                  style="display: inline-block; width: 100%; border: 1px solid #3d5ee1">Berita Acara</a>
            </li>
            <li>
               <a href="" class="file-link px-3 py-3"
                  style="display: inline-block; width: 100%; border: 1px solid #3d5ee1">Surat Keterangan
                  Ujian</a>
            </li>
            <li>
               <a href="" class="file-link px-3 py-3"
                  style="display: inline-block; width: 100%; color: white; background-color: #3d5ee1">Lembar Penilaian</a>
            </li>
         </ul>
      </div>
   </div>
   <div class="row d-flex justify-content-evenly">
      <div class="col-5 bg-white px-4 py-4">
         <form action=""></form>
      </div>
      <div class="col-6 bg-white p-4">
         <iframe id="file-iframe" src="" align="top" height="650" width="100%" frameborder="0"
            scrolling="auto"></iframe>
      </div>
   </div>
</div>
@endsection