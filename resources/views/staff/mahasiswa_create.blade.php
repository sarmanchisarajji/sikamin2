@extends('layouts.main')
@section('main-contents')
<div class="content container-fluid">
   <div class="page-header">
      <div class="row align-items-center">
         <div class="col-sm-12">
            <div class="page-sub-header">
               <h3 class="page-title">{{ isset($mahasiswa) ? 'Edit Mahasiswa' : 'Tambah Mahasiswa' }}</h3>
               <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('s-mahasiswa-index') }}">Mahasiswa</a></li>
                  <li class="breadcrumb-item active">{{ isset($mahasiswa) ? 'Edit Mahasiswa' : 'Tambah Mahasiswa' }}
                  </li>
               </ul>
            </div>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-sm-12">
         <div class="card comman-shadow">
            <div class="card-body">
               <form
                  action="{{ isset($mahasiswa) ? route('s-mahasiswa-update', $mahasiswa->user->id) : route('s-mahasiswa-store') }}"
                  method="POST">
                  @isset($mahasiswa)
                  @method('PUT')
                  @endisset
                  @csrf
                  <div class="col-12">
                     <h5 class="form-title student-info">Data Mahasiswa</h5>
                  </div>
                  <div class="row">
                     <div class="col-12 col-sm-6">
                        <div class="form-group local-forms">
                           <label>Nama Mahasiswa <span class="login-danger">*</span></label>
                           <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                              placeholder="" value="{{ isset($mahasiswa) ? $mahasiswa->nama : '' }}">
                           @error('nama')
                           <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong trong>
                           </span>
                           @enderror
                        </div>
                     </div>
                     <div class="col-12 col-sm-6">
                        <div class="form-group local-forms">
                           <label>NIM <span class="login-danger">*</span></label>
                           <input type="text" class="form-control @error('nim') is-invalid @enderror" name="nim"
                              placeholder="" value="{{ isset($mahasiswa) ? $mahasiswa->nim : '' }}">
                           @error('nim')
                           <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-12 col-sm-6">
                        <div class="form-group local-forms">
                           <label>Tahun Masuk <span class="login-danger">*</span></label>
                           <input type="text" class="form-control @error('tahun_masuk') is-invalid @enderror"
                              name="tahun_masuk" placeholder=""
                              value="{{ isset($mahasiswa) ? $mahasiswa->tahun_masuk : '' }}">
                           @error('tahun_masuk')
                           <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                     </div>
                     <div class="col-12 col-sm-6">
                        <div class="form-group local-forms">
                           <label>Status <span class="login-danger">*</span></label>
                           <select class="form-control select  @error('status') is-invalid @enderror" name="status">
                              <option selected disabled>Pilih status</option>

                              <option value="aktif" {{ isset($mahasiswa) ? $mahasiswa->user->is_aktif == 'y' ?
                                 "selected" :"" : ''}}>Aktif
                              </option>
                              <option value="tidak aktif" {{ isset($mahasiswa) ? $mahasiswa->user->is_aktif == 'n' ?
                                 "selected" :"" : ''
                                 }}>Tidak Aktif
                              </option>
                           </select>
                           @error('status')
                           <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                     </div>
                  </div>

                  <hr>

                  <div class="col-12">
                     <h5 class="form-title student-info">Informasi Akun</h5>
                  </div>
                  <div class="row">
                     <div class="col-12 col-sm-6">
                        <div class="form-group local-forms">
                           <label>Username <span class="login-danger">*</span></label>
                           <input type="text" class="form-control @error('username') is-invalid @enderror"
                              name="username" placeholder=""
                              value="{{ isset($mahasiswa) ? $mahasiswa->user->username : '' }}">
                           @error('username')
                           <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                     </div>
                     <div class="col-12 col-sm-6">
                        <div class="form-group local-forms">
                           <label>Password <span class="login-danger">*</span></label>
                           <input type="password" class="form-control @error('password') is-invalid @enderror"
                              name="password" placeholder="">
                           @error('password')
                           <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                     </div>
                  </div>
                  <div class="col-12">
                     <div class="student-submit">
                        <button type="submit" class="btn btn-primary">Submit</button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>

@endsection