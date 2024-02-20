@extends('layouts.main')
@section('main-contents')
<div class="content container-fluid mb-4 vh-100">
   <div class="page-header">
      <div class="row">
         <div class="col-sm-12">
            <div class="page-sub-header">
               <h3 class="page-title">Bukti Dukung</h3>
               <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('s-v_proposal-index') }}">Verifikasi Ujian</a></li>
                  <li class="breadcrumb-item active">Proposal</li>
               </ul>
            </div>
         </div>
      </div>
   </div>
   <div class="row d-flex justify-content-evenly">
      <div class="col-4 bg-white px-4 py-4">
         <h5 class="mb-4">Nama File</h5>
         <ul>
            @foreach ($file as $item)
            <li>
               <a href="" class="file-link px-3 py-3 my-2"
                  style="display: inline-block; width: 100%; border: 1px solid #3d5ee1"
                  data-src="{{ asset('storage/' . $item->file) }}">{{
                  $item->nama_berkas }}</a>
            </li>
            @endforeach
         </ul>
         <ul class="text-center mt-4">
            <li>
               @foreach ($mahasiswa as $item)
               <form class="d-inline" action="{{ url("/staff/verifikasi_ujian/proposal/bukti_dukung/update/$item->id") }}" method="POST"
                  id="confirmPengajuan{{ $item->id }}">
                  @method('put')
                  @csrf
                  <input type="text" value="disetujui" name="status" hidden>
                  <span>
                     @if ($item->status == 'disetujui')
                     <button type="button" class="btn btn-primary disabled" title="Confirm">
                        Pengajuan Ujian Sudah Disetujui
                     </button>
                     @else
                     <button type="button" class="btn btn-primary" onclick="confirmPengajuan('{{ $item->id }}')"
                        title="Confirm">
                        Setujui Pengajuan Ujian
                     </button>
                     @endif
                  </span>
               </form>
               @endforeach
            </li>
         </ul>
      </div>
      <div class="col-7 bg-white p-4">
         <iframe id="file-iframe" src="{{ asset('storage/' . $file->first()->file) }}" align="top" height="650"
            width="100%" frameborder="0" scrolling="auto"></iframe>
      </div>
   </div>

   <style>
      .selected {
         background-color: #3d5ee1;
         color: #fff
      }
   </style>

   <script>
      document.addEventListener("DOMContentLoaded", function() {
         const fileLinks = document.querySelectorAll('.file-link');
         const fileIframe = document.getElementById('file-iframe');

         fileLinks.forEach(link => {
            link.addEventListener('click', function(event) {
                  event.preventDefault();
                  const fileSrc = this.getAttribute('data-src');
                  fileIframe.src = fileSrc;

                  fileLinks.forEach(link => {
                     link.classList.remove('selected');
                  });

                  this.classList.add('selected');

                  history.pushState({ fileSrc: fileSrc }, null, this.href);
            });
         });

         fileLinks[0].classList.add('selected');
         fileIframe.src = fileLinks[0].getAttribute('data-src');
      });
   </script>
   <script>
      function confirmPengajuan(buktiId) {
               Swal.fire({
                   title: 'Setujui Pengajuan Ujian',
                   icon: 'warning',
                   showCancelButton: true,
                   confirmButtonColor: '#d33',
                   cancelButtonColor: '#3085d6',
                   confirmButtonText: 'Setujui!',
                   cancelButtonText: 'Batal!',
               }).then((result) => {
                   if (result.isConfirmed) {
                       // Jika pengguna menekan "Ya", kirim formulir
                       document.getElementById('confirmPengajuan' + buktiId).submit();
                   }
               });
           }
   </script>

</div>
@endsection