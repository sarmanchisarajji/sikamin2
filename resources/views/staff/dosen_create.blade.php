@extends('layouts.main')
@section('main-contents')
<div class="content container-fluid">
   <div class="page-header">
      <div class="row align-items-center">
         <div class="col-sm-12">
            <div class="page-sub-header">
               <h3 class="page-title">Tambah Dosen</h3>
               <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('s-mahasiswa-index') }}">Dosen</a></li>
                  <li class="breadcrumb-item active">Tambah Dosen</li>
               </ul>
            </div>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-sm-12">
         <div class="card comman-shadow">
            <div class="card-body">
               <form action="{{ route('s-mahasiswa-store') }}" method="POST">
                  @csrf
                  <div class="col-12">
                     <h5 class="form-title student-info">Data Dosen</h5>
                  </div>
                  <div class="row">
                     <div class="col-12 col-sm-4">
                        <div class="form-group local-forms">
                           <label>Nama dosen <span class="login-danger">*</span></label>
                           <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                              placeholder="" value="{{ old('nama') }}">
                           @error('nama')
                           <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong trong>
                           </span>
                           @enderror
                        </div>
                     </div>
                     <div class="col-12 col-sm-4">
                        <div class="form-group local-forms">
                           <label>NIP <span class="login-danger">*</span></label>
                           <input type="text" class="form-control @error('nim') is-invalid @enderror" name="nim"
                              placeholder="" value="{{ old('nim') }}">
                           @error('nim')
                           <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                     </div>
                     <div class="col-12 col-sm-4">
                        <div class="form-group local-forms">
                           <label>NIDN <span class="login-danger">*</span></label>
                           <input type="text" class="form-control @error('nim') is-invalid @enderror" name="nim"
                              placeholder="" value="{{ old('nim') }}">
                           @error('nim')
                           <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-12 col-sm-4">
                        <div class="form-group local-forms">
                           <label>Jabatan Akademik <span class="login-danger">*</span></label>
                           <select class="form-control select  @error('status') is-invalid @enderror" name="status">
                              <option selected disabled>Pilih Jabatan</option>
                              <option value="dosen" {{ old('status')=='aktif' ? "selected" :"Female"}}>Dosen</option>
                              <option value="sekjur" {{ old('status')=='tidak aktif' ? "selected" :""}}>Sekjur</option>
                              <option value="kajur" {{ old('status')=='tidak aktif' ? "selected" :""}}>Kajur</option>
                           </select>
                           @error('status')
                           <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                     </div>
                     <div class="col-12 col-sm-4">
                        <div class="form-group local-forms">
                           <label>TMT Akademik <span class="login-danger">*</span></label>
                           <input type="text" class="form-control @error('nim') is-invalid @enderror" name="nim"
                              placeholder="" value="{{ old('nim') }}">
                           @error('nim')
                           <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                     </div>
                     <div class="col-12 col-sm-4">
                        <div class="form-group local-forms">
                           <label>Pangkat <span class="login-danger">*</span></label>
                           <input type="text" class="form-control @error('nim') is-invalid @enderror" name="nim"
                              placeholder="" value="{{ old('nim') }}">
                           @error('nim')
                           <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-12 col-sm-4">
                        <div class="form-group local-forms">
                           <label>TMT Pangkat <span class="login-danger">*</span></label>
                           <input type="text" class="form-control @error('tahun_masuk') is-invalid @enderror"
                              name="tahun_masuk" placeholder="" value="{{ old('tahun_masuk') }}">
                           @error('tahun_masuk')
                           <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                     </div>
                     <div class="col-12 col-sm-4">
                        <div class="form-group local-forms">
                           <label>Pendidikan Terakhir <span class="login-danger">*</span></label>
                           <input type="text" class="form-control @error('tahun_masuk') is-invalid @enderror"
                              name="tahun_masuk" placeholder="" value="{{ old('tahun_masuk') }}">
                           @error('tahun_masuk')
                           <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                     </div>
                     <div class="col-12 col-sm-4">
                        <div class="form-group local-forms">
                           <label>Status <span class="login-danger">*</span></label>
                           <select class="form-control select  @error('status') is-invalid @enderror" name="status">
                              <option selected disabled>Pilih status</option>
                              <option value="aktif" {{ old('status')=='aktif' ? "selected" :"Female"}}>Aktif</option>
                              <option value="tidak aktif" {{ old('status')=='tidak aktif' ? "selected" :""}}>Tidak Aktif
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
                              name="username" placeholder="" value="{{ old('username') }}">
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
                           <input type="text" class="form-control @error('password') is-invalid @enderror"
                              name="password" placeholder="" value="{{ old('password') }}">
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