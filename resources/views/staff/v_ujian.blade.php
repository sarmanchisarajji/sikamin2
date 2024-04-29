@extends('layouts.main')
@section('main-contents')
<div class="content container-fluid">
   <div class="page-header">
      <div class="row">
         <div class="col-sm-12">
            <div class="page-sub-header">
               <h3 class="page-title">Verifikasi Ujian</h3>
               <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="">Verifikasi Ujian</a></li>
                  <li class="breadcrumb-item active">Proposal</li>
               </ul>
            </div>
         </div>
      </div>
   </div>

   <div class="settings-menu-links">
      <ul class="nav nav-tabs menu-tabs">
         <li class="nav-item active">
            <a class="nav-link" href="{{ route('s-v_proposal-index') }}">Proposal</a>
         </li>
         <li class="nav-item ">
            <a class="nav-link" href="">Hasil</a>
         </li>
         <li class="nav-item ">
            <a class="nav-link" href="">Skripsi</a>
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
                           <th style="background-color: #3d5ee1" class="text-white col-2">Nama Lengkap</th>
                           <th style="background-color: #3d5ee1" class="text-white col-2">NIM</th>
                           <th style="background-color: #3d5ee1" class="text-white col-3">Judul</th>
                           <th style="background-color: #3d5ee1" class="text-white col-2">Status</th>
                           <th style="background-color: #3d5ee1" class="text-white col-1">Action</th>
                           <th style="background-color: #3d5ee1" class="text-white col-1">Draft</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($proposal as $key => $item)
                        <tr class="text-center">
                           <td>{{ $loop->iteration }}</td>
                           <td>{{ $item->mahasiswa->nama }}</td>
                           <td>{{ $item->mahasiswa->nim }}</td>
                           <td>{{ $item->judul }}</td>
                           <td>{{ $item->status }}</td>
                           <td class="d-flex flex-column">
                              <div>
                                 <a href="" class="btn text-white" style="background-color: orangered">Verifikasi</a>
                              </div>
                              <div>
                                 <a href="{{ route('s-bukti_dukung', ['id'=> $item->id]) }}" class="btn text-white"
                                    style="background-color: greenyellow">Bukti
                                    Dukung</a>
                              </div>
                           </td>
                           <td>
                              <div class="dropdown dropdown-action fs-5">
                                 <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false"><i class="fas fa-ellipsis-h"></i></a>
                                 <div class="dropdown-menu dropdown-menu-end fs-6">
                                    <a class="dropdown-item py-2" href="{{ route('s-penunjukan_pembimbing') }}">Surat
                                       Penunjukkan Pembimbing</a>
                                    <a class="dropdown-item py-2" href="{{ route('s-tugas_ujian') }}">Surat Tugas
                                       Ujian</a>
                                    <a class="dropdown-item py-2" href="{{ route('s-berita_acara') }}">Berita Acara</a>
                                    <a class="dropdown-item py-2" href="{{ route('s-keterangan_ujian') }}">Surat
                                       Keterangan Ujian</a>
                                    <a class="dropdown-item py-2" href="{{ route('s-lembar_penilaian') }}">Lembar
                                       Penilaian</a>
                                 </div>
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