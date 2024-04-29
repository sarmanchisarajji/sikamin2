@extends('layouts.main')
@section('main-contents')
<div class="content container-fluid">
   <div class="page-header">
      <div class="row align-items-center">
         <div class="col-sm-12">
            <div class="page-sub-header">
               <h3 class="page-title">{{ isset($dosen) ? 'Edit Dosen' : 'Tambah Dosen' }}</h3>
               <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('s-dosen-index') }}">Dosen</a></li>
                  <li class="breadcrumb-item active">{{ isset($dosen) ? 'Edit Dosen' : 'Tambah Dosen' }}</li>
               </ul>
            </div>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-sm-12">
         <div class="card comman-shadow">
            <div class="card-body">
               <form action="{{ isset($dosen) ? route('s-dosen-update', $dosen->user->id) : route('s-dosen-store') }}"
                  method="POST">
                  @isset($dosen)
                  @method('PUT')
                  @endisset
                  @csrf
                  <div class="col-12">
                     <h5 class="form-title student-info">Data Dosen</h5>
                  </div>
                  <div class="row">
                     <div class="col-12 col-sm-4">
                        <div class="form-group local-forms">
                           <label>Nama dosen <span class="login-danger">*</span></label>
                           <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                              placeholder="" value="{{ isset($dosen) ? $dosen->nama_dosen : '' }}">
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
                           <input type="text" class="form-control @error('nip') is-invalid @enderror" name="nip"
                              placeholder="" value="{{ isset($dosen) ? $dosen->nip : '' }}">
                           @error('nip')
                           <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                     </div>
                     <div class="col-12 col-sm-4">
                        <div class="form-group local-forms">
                           <label>NIDN <span class="login-danger">*</span></label>
                           <input type="text" class="form-control @error('nidn') is-invalid @enderror" name="nidn"
                              placeholder="" value="{{ isset($dosen) ? $dosen->nidn : '' }}">
                           @error('nidn')
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
                           <select class="form-control select  @error('jabatan') is-invalid @enderror" name="jabatan">
                              <option selected disabled>Pilih Jabatan</option>
                              <option value="dosen" {{ isset($dosen) ? $dosen->jabatan_akademik == 'dosen' ?
                                 "selected" :"" : ''}}>Dosen</option>
                              <option value="sekjur" {{ isset($dosen) ? $dosen->jabatan_akademik == 'sekjur' ?
                                 "selected" :"" : ''}}>Sekjur</option>
                              <option value="kajur" {{ isset($dosen) ? $dosen->jabatan_akademik == 'kajur' ?
                                 "selected" :"" : ''}}>Kajur</option>
                           </select>
                           @error('jabatan')
                           <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                     </div>
                     <div class="col-12 col-sm-4">
                        <div class="form-group local-forms">
                           <label>TMT Akademik <span class="login-danger">*</span></label>
                           <input type="date" class="form-control @error('tmt_akademik') is-invalid @enderror"
                              name="tmt_akademik" placeholder="" value="{{ isset($dosen) ? $dosen->tmt_akademik : '' }}"
                              }}">
                           @error('tmt_akademik')
                           <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                     </div>
                     <div class="col-12 col-sm-4">
                        <div class="form-group local-forms">
                           <label>Pangkat <span class="login-danger">*</span></label>
                           <input type="text" class="form-control @error('pangkat') is-invalid @enderror" name="pangkat"
                              placeholder="" value="{{ isset($dosen) ? $dosen->pangkat : '' }}">
                           @error('pangkat')
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
                           <input type="date" class="form-control @error('tmt_pangkat') is-invalid @enderror"
                              name="tmt_pangkat" placeholder="" value="{{ isset($dosen) ? $dosen->tmt_pangkat : '' }}">
                           @error('tmt_pangkat')
                           <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                     </div>
                     <div class="col-12 col-sm-4">
                        <div class="form-group local-forms">
                           <label>Pendidikan Terakhir <span class="login-danger">*</span></label>
                           <input type="text" class="form-control @error('pendidikan_terakhir') is-invalid @enderror"
                              name="pendidikan_terakhir" placeholder=""
                              value="{{ isset($dosen) ? $dosen->pendidikan_terakhir : '' }}">
                           @error('pendidikan_terakhir')
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
                              <option value="aktif" {{ isset($dosen) ? $dosen->user->is_aktif == 'y' ?
                                 "selected" :"" : ''}}>Aktif</option>
                              <option value="tidak aktif" {{ isset($dosen) ? $dosen->user->is_aktif == 'n' ?
                                 "selected" :"" : ''}}>Tidak Aktif
                              </option>
                              {{-- <option value="tugas_belajar" {{ old('status')=='tugas belajar' ? "selected" :""}}>Tugas
                                 Belajar
                              </option> --}}
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
                              name="username" placeholder="" value="{{ isset($dosen) ? $dosen->user->username : '' }}">
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
                              name="password" placeholder="" value="{{ isset($password) ? $mahasiswa->user->password : '' }}">
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