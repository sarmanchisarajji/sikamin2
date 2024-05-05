@extends('layouts.main')
@section('main-contents')
<div class="py-3 px-3 container-fluid">
   <div class="row mb-4">
      <div class="col-md-4 col-12">
         <div class="bg-comman w-100 mb-3" style="background-color: salmon">
            <div class="card-body">
               <div class="db-widgets d-flex justify-content-between align-items-center">
                  <div class="">
                     <h4 class="text-white">Total Mahasiswa</h4>
                     <h3 class="text-white">{{ $mahasiswa->count() }}</h3>
                  </div>
               </div>
            </div>
         </div>
         <div class="bg-comman w-100 mb-3 mb-md-0" style="background-color: lightgreen">
            <div class="card-body">
               <div class="db-widgets d-flex justify-content-between align-items-center">
                  <div class="">
                     <h4 class="text-white">Total Dosen</h4>
                     <h3 class="text-white">{{ $dosen }}</h3>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-md-8 col-12">
         <div class="bg-comman w-100 h-100" style="background-color: lightskyblue;">
            <div class="card-body">
               <div class="db-widgets">
                  <div>
                     <h4 class="text-white">Total Pengajuan ujian</h4>
                  </div>
                  <div class="d-flex justify-content-center mt-5">
                     <div class="d-flex w-100 justify-content-between px-5">
                        <div>
                           <h5 class="text-white">Proposal</h5>
                           <h3 class="text-white">{{ $proposal }}</h3>
                        </div>
                        <div>
                           <h5 class="text-white">Hasil</h5>
                           <h3 class="text-white">{{ $hasil }}</h3>
                        </div>
                        <div>
                           <h5 class="text-white">Skripsi</h5>
                           <h3 class="text-white">{{ $skripsi }}</h3>
                        </div>
                     </div>
                  </div>
               </div>
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

   <div class="row mb-5">
      <div class="col-12">
         <div class="col-12 pt-3 pb-2 text-white fw-bold" style="background-color: #3d5ee1;">
            <ul class="d-flex justify-content-between text-center">
               <li class="col-1">No</li>
               <li class="col-2">Nama</li>
               <li class="col-2">Nim</li>
               <li class="col-4">Judul</li>
               <li class="col-1">Status</li>
               <li class="col-1">Angkatan</li>
               <li class="col-1">Detail</li>
            </ul>
         </div>
         @foreach ($mahasiswa as $item)
         <div class="accordion accordion-flush mb-1" id="accordionFlushExample">
            <div class="accordion-item">
               <div class="accordion-header pt-3 pb-1" id="flush-headingOne">
                  <ul class="d-flex justify-content-between align-items-center text-center">
                     <li class="col-1">{{ $loop->iteration }}</li>
                     <li class="col-2">{{ $item->nama }}</li>
                     <li class="col-2">{{ $item->nim }}</li>
                     {{-- @dd($item->ujian) --}}
                     <li class="col-4">
                        @if (isset($item->ujian[0]) && !isset($item->ujian[1]) && !isset($item->ujian[2]))
                        {{ $item->ujian[0]->judul }}
                        @elseif (isset($item->ujian[0]) && isset($item->ujian[1]) && !isset($item->ujian[2]))
                        {{ $item->ujian[1]->judul }}
                        @elseif (isset($item->ujian[0]) && isset($item->ujian[1]) && isset($item->ujian[2]))
                        {{ $item->ujian[2]->judul }}
                        @endif
                     </li>
                     <li class="col-1 rounded-pill text-white {{ $item->status == 'aktif' ? 'bg-warning' : 'bg-info' }}">Aktif</li>
                     <li class="col-1">2020</li>
                     <li class="col-1">
                        <i class="fas fa-chevron-down collapsed p-2 rounded-pill"
                           style="background-color: #3d5ee1; color: white" data-bs-toggle="collapse"
                           data-bs-target="#flush-collapseOne{{ $item->id }}" aria-expanded="false"
                           aria-controls="flush-collapseOne{{ $item->id }}"></i>
                     </li>
                  </ul>
               </div>
               <div id="flush-collapseOne{{ $item->id }}" class="accordion-collapse collapse"
                  aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                  <div class="accordion-body" style="">
                     <div class="">
                        <div class="row">
                           <div class="">
                              <h4>Timeline Progres</h4>
                              <ul class="timeline">
                                 @foreach ($item->ujian->where('jenis_ujian', 'skripsi') as $acc)
                                 @if ($acc->status == 'selesai')
                                 <li>
                                    <a href="#" class="float-right">{{
                                       \Carbon\Carbon::parse($acc->updated_at)->locale('id_ID')->isoFormat('dddd, D
                                       MMMM YYYY') }}</a><br>
                                    <span class="h6" style="color: blue">Selesai</span>
                                    <p>Mahasiswa telah melakukan Ujian Skripsi</p>
                                 </li>
                                 @endif
                                 @endforeach

                                 {{-- skripsi --}}
                                 @foreach ($item->ujian->where('jenis_ujian', 'skripsi') as $acc)
                                 @if ($acc->tanggal_ujian)
                                 <li>
                                    <a href="#" class="float-right">{{
                                       \Carbon\Carbon::parse($acc->tanggal_ujian)->locale('id_ID')->isoFormat('dddd, D
                                       MMMM YYYY') }}</a><br>
                                    <span class="h6" style="color: blue">Pelaksanaan Seminar Skripsi</span>
                                    <div class="px-2 py-2"
                                       style="background-color: lightblue; border: 1px solid blue; border-radius: 3px">
                                       <div>
                                          <span>No Sk. {{ $acc->no_sk }}</span>
                                       </div>
                                       <div>
                                          <span>Pembimbing : {{ $acc->pembimbing_1->nama_dosen }}, {{
                                             $acc->pembimbing_2->nama_dosen }}</span>
                                       </div>
                                       <div>
                                          <span>Penguji : {{ $acc->penguji_1->nama_dosen }},
                                             {{$acc->penguji_2->nama_dosen }}, {{
                                             $acc->penguji_3->nama_dosen }}</span>
                                       </div>
                                    </div>
                                 </li>
                                 @endif
                                 @if ($acc->status == 'disetujui' | $acc->status == 'selesai')
                                 <li>
                                    <a href="#" class="float-right">{{
                                       \Carbon\Carbon::parse($acc->updated_at)->locale('id_ID')->isoFormat('dddd, D
                                       MMMM YYYY') }}</a><br>
                                    <span class="h6" style="color: green">Pengajuan Seminar Skripsi disetujui</span>
                                    <div class="px-2 py-2"
                                       style="background-color: lightgreen; border: 1px solid green; border-radius: 3px">
                                       <div>
                                          <span style="text-transform: uppercase">{{ $acc->judul }}</span>
                                       </div>
                                       <div>
                                          <span>Pembimbing : {{ $acc->pembimbing_1->nama_dosen }},
                                             {{$acc->pembimbing_2->nama_dosen
                                             }}</span>
                                       </div>
                                    </div>

                                 </li>
                                 @endif
                                 <li>
                                    <a href="#" class="float-right">{{
                                       \Carbon\Carbon::parse($acc->created_at)->locale('id_ID')->isoFormat('dddd, D
                                       MMMM YYYY') }}</a><br>
                                    <span class="h6">Pengajuan Seminar Skripsi</span>
                                    <p style="text-transform: uppercase">{{ $acc->judul }}</p>
                                 </li>
                                 @endforeach

                                 {{-- hasil --}}
                                 @foreach ($item->ujian->where('jenis_ujian', 'hasil') as $acc)
                                 @if ($acc->tanggal_ujian)
                                 <li>
                                    <a href="#" class="float-right">{{
                                       \Carbon\Carbon::parse($acc->tanggal_ujian)->locale('id_ID')->isoFormat('dddd, D
                                       MMMM YYYY') }}</a><br>
                                    <span class="h6" style="color: blue">Pelaksanaan Seminar Hasil</span>
                                    <div class="px-2 py-2"
                                       style="background-color: lightblue; border: 1px solid blue; border-radius: 3px">
                                       <div>
                                          <span>No Sk. {{ $acc->no_sk }}</span>
                                       </div>
                                       <div>
                                          <span>Pembimbing : {{ $acc->pembimbing_1->nama_dosen }}, {{
                                             $acc->pembimbing_2->nama_dosen }}</span>
                                       </div>
                                       <div>
                                          <span>Penguji : {{ $acc->penguji_1->nama_dosen }},
                                             {{$acc->penguji_2->nama_dosen }}, {{
                                             $acc->penguji_3->nama_dosen }}</span>
                                       </div>
                                    </div>
                                 </li>
                                 @endif
                                 @if ($acc->status == 'disetujui')
                                 <li>
                                    <a href="#" class="float-right">{{
                                       \Carbon\Carbon::parse($acc->updated_at)->locale('id_ID')->isoFormat('dddd, D
                                       MMMM YYYY') }}</a><br>
                                    <span class="h6" style="color: green">Pengajuan Seminar Hasil disetujui</span>
                                    <div class="px-2 py-2"
                                       style="background-color: lightgreen; border: 1px solid green; border-radius: 3px">
                                       <div>
                                          <span style="text-transform: uppercase">{{ $acc->judul }}</span>
                                       </div>
                                       <div>
                                          <span>Pembimbing : {{ $acc->pembimbing_1->nama_dosen }},
                                             {{$acc->pembimbing_2->nama_dosen
                                             }}</span>
                                       </div>
                                    </div>

                                 </li>
                                 @endif
                                 <li>
                                    <a href="#" class="float-right">{{
                                       \Carbon\Carbon::parse($acc->created_at)->locale('id_ID')->isoFormat('dddd, D
                                       MMMM YYYY') }}</a><br>
                                    <span class="h6">Pengajuan Seminar Hasil</span>
                                    <p style="text-transform: uppercase">{{ $acc->judul }}</p>
                                 </li>
                                 @endforeach

                                 {{-- proposal --}}
                                 @foreach ($item->ujian->where('jenis_ujian', 'proposal') as $acc)
                                 @if ($acc->tanggal_ujian)
                                 <li>
                                    <a href="#" class="float-right">{{
                                       \Carbon\Carbon::parse($acc->tanggal_ujian)->locale('id_ID')->isoFormat('dddd, D
                                       MMMM YYYY') }}</a><br>
                                    <span class="h6" style="color: blue">Pelaksanaan Seminar Proposal</span>
                                    <div class="px-2 py-2"
                                       style="background-color: lightblue; border: 1px solid blue; border-radius: 3px">
                                       <div>
                                          <span>No Sk. {{ $acc->no_sk }}</span>
                                       </div>
                                       <div>
                                          <span>Pembimbing : {{ $acc->pembimbing_1->nama_dosen }}, {{
                                             $acc->pembimbing_2->nama_dosen }}</span>
                                       </div>
                                       <div>
                                          <span>Penguji : {{ $acc->penguji_1->nama_dosen }}, {{
                                             $acc->penguji_2->nama_dosen }}, {{ $acc->penguji_3->nama_dosen
                                             }}</span>
                                       </div>
                                    </div>
                                 </li>
                                 @endif
                                 @if ($acc->status == 'disetujui')
                                 <li>
                                    <a href="#" class="float-right">{{
                                       \Carbon\Carbon::parse($acc->updated_at)->locale('id_ID')->isoFormat('dddd, D
                                       MMMM YYYY') }}</a><br>
                                    <span class="h6" style="color: green">Pengajuan Seminar {{ $acc->jenis_ujian ==
                                       'proposal' ?
                                       'proposal' :
                                       'hasil' }} disetujui</span>
                                    <div class="px-2 py-2"
                                       style="background-color: lightgreen; border: 1px solid green; border-radius: 3px">
                                       <div>
                                          <span style="text-transform: uppercase">{{ $acc->judul }}</span>
                                       </div>
                                       <div>
                                          <span>Pembimbing : {{ $acc->pembimbing_1->nama_dosen }}, {{
                                             $acc->pembimbing_2->nama_dosen }}</span>
                                       </div>
                                    </div>

                                 </li>
                                 @endif
                                 <li>
                                    <a href="#" class="float-right">{{
                                       \Carbon\Carbon::parse($acc->created_at)->locale('id_ID')->isoFormat('dddd, D
                                       MMMM YYYY') }}</a><br>
                                    <span class="h6">Pengajuan Seminar {{ $acc->jenis_ujian == 'proposal' ? 'proposal' :
                                       'hasil' }}</span>
                                    <p style="text-transform: uppercase">{{ $acc->judul }}</p>
                                 </li>
                                 @endforeach

                                 <li>
                                    <a href="#" class="float-right">{{
                                       \Carbon\Carbon::parse($item->created_at)->locale('id_ID')->isoFormat('dddd, D
                                       MMMM YYYY') }}</a><br>
                                    <span class="h6">Pembuatan Akun</span>
                                    <p>Pendaftaran mahasiswa dan pembuatan akun</p>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         @endforeach
      </div>
   </div>
</div>

<style>
   ul.timeline {
      list-style-type: none;
      margin-left: -20px;
   }

   ul.timeline:before {
      content: ' ';
      background: #d4d9df;
      display: inline-block;
      position: absolute;
      left: 30px;
      width: 2px;
      height: 100%;
      z-index: 400;

   }

   ul.timeline>li {
      margin: 20px 0;
      padding-left: 50px;
   }

   ul.timeline>li:before {
      content: ' ';
      background: white;
      display: inline-block;
      position: absolute;
      border-radius: 50%;
      border: 3px solid #22c0e8;
      left: 20px;
      width: 20px;
      height: 20px;
      z-index: 400;
   }
</style>
@endsection