@extends('layouts.main')
@section('main-contents')
<div class="content container-fluid mb-4">

   @include('staff.components.draft_layout', ['title' => 'SK Pembimbing'])

   <div class="d-md-flex justify-content-evenly">
      <div class="col-md-4 col-12">
         <div class="bg-white px-4 py-4">
            <form action="{{ route('s-sk_pembimbing_update', $ujian->id) }}" method="post">
               @csrf
               @method('PUT')
               <div class="form-group local-forms">
                  <label>No Surat <span class="login-danger">*</span></label>
                  <input type="text" class="form-control" name="no_surat" placeholder=" /UN29.10/PP/2023" value="">
               </div>
               <div class="mt-4">
                  <button class="btn btn-primary col-12" type="submit">Kirim</button>
               </div>
            </form>
         </div>
      </div>
      <div class="col-md-7 col-12 bg-white p-4">
         <iframe id="file-iframe" src="{{ route('sk_pembimbing', $ujian->id) }}" align="top" height="800" width="100%"
            frameborder="0" scrolling="auto"></iframe>
      </div>
   </div>
</div>
<style>
   .custum-file-upload {
      height: 200px;
      width: 100%;
      display: flex;
      flex-direction: column;
      align-items: space-between;
      gap: 20px;
      cursor: pointer;
      align-items: center;
      justify-content: center;
      border: 2px dashed #cacaca;
      background-color: rgba(255, 255, 255, 1);
      padding: 1.5rem;
      border-radius: 10px;
      box-shadow: 0px 48px 35px -48px rgba(0, 0, 0, 0.1);
   }

   .custum-file-upload .icon {
      display: flex;
      align-items: center;
      justify-content: center;
   }

   .custum-file-upload .icon svg {
      height: 80px;
      fill: rgba(75, 85, 99, 1);
   }

   .custum-file-upload .text {
      display: flex;
      align-items: center;
      justify-content: center;
   }

   .custum-file-upload .text span {
      font-weight: 400;
      color: rgba(75, 85, 99, 1);
   }

   .custum-file-upload input {
      display: none;
   }
</style>
@endsection