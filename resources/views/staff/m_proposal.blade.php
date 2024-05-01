@extends('layouts.main')
@section('main-contents')
<div class="content container-fluid">
   <div class="page-header">
      <div class="row">
         <div class="col-sm-12">
            <div class="page-sub-header">
               <h3 class="page-title">Monitoring Ujian</h3>
               <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="">Monitoring Ujian</a></li>
                  <li class="breadcrumb-item active">Proposal</li>
               </ul>
            </div>
         </div>
      </div>
   </div>

   <div class="settings-menu-links">
      <ul class="nav nav-tabs menu-tabs d-flex">
         <li class="nav-item">
            <a class="nav-link" href="{{ route('s-m_ujian-index') }}">Semua</a>
         </li>
         <li class="nav-item active">
            <a class="nav-link" href="{{ route('s-m_proposal-index') }}">Proposal</a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="{{ route('s-m_hasil-index') }}">Hasil</a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="{{ route('s-m_skripsi-index') }}">Skripsi</a>
         </li>
      </ul>
   </div>

   <div class="row">
      <div class="col-sm-12">
         <div class="card card-table comman-shadow">
            <div class="card-body">
               <div class="table-responsive">
                  <table id="example" class="display table table-hover table-striped" style="width:100%">
                     <thead class="student-thread">
                        <tr class="text-center">
                           <th style="background-color: #3d5ee1" class="text-white col-1">No</th>
                           <th style="background-color: #3d5ee1" class="text-white col-3">Nama Lengkap</th>
                           <th style="background-color: #3d5ee1" class="text-white col-2">NIM</th>
                           <th style="background-color: #3d5ee1" class="text-white col-5">Judul</th>
                           <th style="background-color: #3d5ee1" class="text-white col-1">Nilai Ujian</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($proposal as $key => $item)
                        <tr class="text-center">
                           <td>{{ $loop->iteration }}</td>
                           <td>{{ $item->mahasiswa->nama }}</td>
                           <td>{{ $item->mahasiswa->nim }}</td>
                           <td>{{ $item->judul }}</td>
                           <td>{{ !$item->nilai_ujian ? '-' : $item->nilai_ujian}}</td>
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