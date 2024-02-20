@extends('layouts.main')
@section('main-contents')
<div class="content container-fluid">
   <div class="page-header">
      <div class="row">
         <div class="col-sm-12">
            <div class="page-sub-header">
               <h3 class="page-title">Kelola Data Mahasiswa</h3>
               <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="">Mahasiswa</a></li>
               </ul>
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
                        <h3 class="page-title">Data Mahasiswa</h3>
                     </div>
                     <div class="col-auto text-end float-end ms-auto download-grp">
                        <a href="#" class="btn btn-outline-primary me-2"><i class="fas fa-download"></i>
                           Download</a>
                        <a href="{{ route('s-mahasiswa-create') }}" class="btn btn-primary"><i
                              class="fas fa-plus"></i></a>
                     </div>
                  </div>
               </div>
               <div class="table-responsive">
                  <table id="example" class="display table table-hover table-striped" style="width:100%">
                     <thead class="student-thread">
                        <tr class="text-center">
                           <th style="background-color: #3d5ee1" class="text-white" class="col-1">No</th>
                           <th style="background-color: #3d5ee1" class="text-white" class="col-4">Nama</th>
                           <th style="background-color: #3d5ee1" class="text-white" class="col-2">NIM</th>
                           <th style="background-color: #3d5ee1" class="text-white" class="col-2">Tahun Masuk</th>
                           <th style="background-color: #3d5ee1" class="text-white" class="col-1">Status</th>
                           <th style="background-color: #3d5ee1" class="text-white" class="col-2">Action</th>
                        </tr>
                     </thead>
                     <tbody class="text-center">
                        @foreach ($mahasiswa as $key => $item)
                        <tr>
                           <td>{{ $loop->iteration }}</td>
                           <td>{{ $item->nama }}</td>
                           <td>{{ $item->nim }}</td>
                           <td>{{ $item->tahun_masuk }}</td>
                           <td><span
                                 class="{{ $item->user->is_aktif == 'y' ? 'bg-info' : 'bg-warning' }} px-3 text-white rounded-pill">{{
                                 $item->user->is_aktif == 'y' ? 'Aktif' : 'Tidak Aktif' }}</span></td>
                           <td>
                              <div>
                                 <a href="{{ route('s-mahasiswa-edit', $item->user->id) }}"
                                    class="btn btn-sm bg-danger-light">
                                    <i class="feather-edit"></i>
                                 </a>
                                 <form class="d-inline" action="{{ route('s-mahasiswa-delete', $item->user->id) }}"
                                    method="POST" id="deleteMhs{{ $item->user->id }}">
                                    @method('delete')
                                    @csrf
                                    <span>
                                       <button type="button" onclick="confirmDelete({{ $item->user->id}})"
                                          class="btn btn-sm bg-danger-light" title="Hapus">
                                          <i class="feather-trash-2 me-1"></i>
                                       </button>
                                    </span>
                                 </form>
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
<script>
   function confirmDelete(id) {
            Swal.fire({
                title: 'Konfirmasi',
                text: 'Apakah Anda yakin ingin menghapus?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal!',
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('deleteMhs' + id).submit();
                }
            });
        }
</script>
@endsection