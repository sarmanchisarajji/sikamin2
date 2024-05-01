@extends('layouts.main')

@section('main-contents')
<div class="content container-fluid">
   <div class="page-header">
      <div class="row">
         <div class="col-sm-12">
            <div class="page-sub-header">
               <h3 class="page-title">Monitoring Dosen</h3>
               <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Dosen</a></li>
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
      @foreach ($dosens as $item)
      <div class="card px-2 py-2 d-flex flex-row align-items-center gap-3 bg-white col-md-5 col-12">
         <div style="width: 130px; height: 150px;">
            <img src="{{ asset('/assets/img/'. $item->user->foto) }}" alt=""
               style="border-radius: 6px; width: inherit; height: inherit; object-fit: fill;">
         </div>
         <div class="w-100">
            <p class="fs-5 fw-bold">{{ $item->nama_dosen }}</p>
            <p class="fw-bold text-secondary" style="margin-top: -20px">Teknik Informatika</p>
            <div class="d-flex justify-content-evenly gap-2" style="border-radius: 6px; margin-top: -10px;">
               <div style="width: 50%">
                  <a class=" btn btn-primary" href="" data-bs-toggle="modal" style="width: 100%"
                     data-bs-target="#modalPembimbing{{ $item->id }}">Pembimbing <br>{{ $item->total_bimbingan}}</a>
               </div>
               <div style="width: 50%">
                  <a class=" btn btn-danger" href="" data-bs-toggle="modal" style="width: 100%"
                     data-bs-target="#modalPenguji{{ $item->id }}">Penguji <br>{{ $item->total_pengujian }}</a>
               </div>

            </div>
         </div>
      </div>

      {{-- Modal Pembimbing --}}
      <div class="modal fade" id="modalPembimbing{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
         <div class="modal-dialog modal-xl">
            <div class="modal-content">
               <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Mahasiswa</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                  <div class="table-responsive">
                     <table id="" class="display " style="width:100%">
                        <thead class="student-thread">
                           <tr class="text-center">
                              <th style="background-color: #3d5ee1" class="text-white" class="col-1">No</th>
                              <th style="background-color: #3d5ee1" class="text-white" class="col-3">Nama</th>
                              <th style="background-color: #3d5ee1" class="text-white" class="col-8">Judul</th>
                           </tr>
                        </thead>
                        <tbody class="text-center">
                           @foreach ($item->mahasiswasBimbingan as $mahasiswa)
                           <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $mahasiswa['nama'] }}</td>
                              <td>{{ $mahasiswa['judul'] }}</td>
                           </tr>
                           @endforeach
                        </tbody>
                     </table>
                  </div>
               </div>
              
            </div>
         </div>
      </div>

      {{-- Modal Penguji --}}
      <div class="modal fade" id="modalPenguji{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
         <div class="modal-dialog modal-xl">
            <div class="modal-content">
               <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Mahasiswa</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                  <div class="table-responsive">
                     <table id="" class="display " style="width:100%">
                        <thead class="student-thread">
                           <tr class="text-center">
                              <th style="background-color: #3d5ee1" class="text-white" class="col-1">No</th>
                              <th style="background-color: #3d5ee1" class="text-white" class="col-3">Nama</th>
                              <th style="background-color: #3d5ee1" class="text-white" class="col-8">Judul</th>
                           </tr>
                        </thead>
                        <tbody class="text-center">
                           @foreach ($item->mahasiswasPenguji as $mahasiswa)
                           <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $mahasiswa['nama'] }}</td>
                              <td>{{ $mahasiswa['judul'] }}</td>
                           </tr>
                           @endforeach
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
      @endforeach
   </div>
</div>
@endsection