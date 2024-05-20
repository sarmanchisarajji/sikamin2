<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Document</title>
</head>

<style>
   * {
      margin: 0;
      padding: 0
   }

   body {
      padding: 20px;
   }

   main {
      padding-right: 60px;
      padding-left: 60px;
      font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
      margin-top: 50px;
      font-size: 14px
   }

   header {
      width: 86%;
      border-bottom: 4px solid black;
      position: relative;
      top: 100px;
      left: 50%;
      transform: translate(-50%, -50%);
   }

   .title {
      vertical-align: top;
      padding-right: 20px;
      width: 130px
   }
</style>

<body>
   {{-- HALAMAN 1 --}}
   <header>
      <table>
         <tr>
            <td style="text-align: center; padding-left: 25px">
               <img src="./assets/img/logo-uho.png" alt="logo-uho" width="85"
                  style="position: fixed; top: 30px; left: 0px">
               <h3 style="">KEMENTERIAN PENDIDIKAN, KEBUDAYAAN,
                  <br /> RISET DAN TEKNOLOGI
                  <br />UNIVERSITAS HALU OLEO
                  <br /> FAKULTAS TEKNIK
               </h3>
               <p>Kampus Hijau Bumi Tridharma Anduonohu, Jl. HEA. Mokodompit Kendari<br />Gedung
                  F.Teknik Lt. 3, Telp.
                  (0401) 3194347, Fax. (0401) 31952874, Website: ti.eng.uho.ac.id</p>
            </td>
         </tr>
      </table>
   </header>
   <main>
      <table style="text-align: start; width: 100%;">
         <tr>
            <td class="title">Nomor</td>
            <td style="vertical-align: top; padding-right: 3px;">:</td>
            @if ($ujian->no_surat_undangan == null)
            <td class="col-6"><span style="padding-right: 30px"> </span>/UN29.10/PP/{{ date('Y') }}</td>
            @else
            <td class="col-6"><span style=""> </span>{{$ujian->no_surat_undangan}}</td>
            @endif
            <td class="col-6">Kendari, {{ \Carbon\Carbon::parse($ujian->updated_at)->locale('id_ID')->isoFormat('DD MMMM YYYY') }}</td>
         </tr>
         <tr>
            <td class="title">Hal</td>
            <td style="vertical-align: top; padding-right: 3px;">:</td>
            <td class="">Ujian Seminar Proposal</td>
         </tr>
         <tr>
            <td class="title">kepada</td>
            <td style="vertical-align: top; padding-right: 3px;">:</td>
            <td class="">Yth. Bapak / Ibu <br>Di - <br>Tempat</td>
         </tr>
      </table>

      <div style="margin-top: 20px">
         <p>Dengan hormat,<br>
            Kami mengundang Bapak/Ibu untuk menghadiri Ujian Seminar Proposal Mahasiswa tersebut <br>
            di bawah ini :</p>
      </div>

      <table style="text-align: start; width: 100%;">
         <tr>
            <td class="title">Nama</td>
            <td style="vertical-align: top; padding-right: 3px;">:</td>
            <td class="">{{ $ujian->mahasiswa->nama}}</td>
         </tr>
         <tr>
            <td class="title">NIM</td>
            <td style="vertical-align: top; padding-right: 3px;">:</td>
            <td class="">{{ $ujian->mahasiswa->nim}}</td>
         </tr>
         <tr>
            <td class="title">Judul Tugas Akhir</td>
            <td style="vertical-align: top; padding-right: 3px;">:</td>
            <td class="">{{ $ujian->judul}}</td>
         </tr>
      </table>

      <div style="margin-top: 20px">
         <p>Yang dilaksanakan pada :</p>
      </div>
      <table>
         <tr>
            <td class="title">Hari</td>
            <td style="vertical-align: top; padding-right: 3px;">:</td>
            <td class="">{{
               \Carbon\Carbon::parse($ujian->tanggal_ujian)->locale('id_ID')->isoFormat('dddd, D MMMM YYYY') }}</td>
         </tr>
         <tr>
            <td class="title">Jam</td>
            <td style="vertical-align: top; padding-right: 3px;">:</td>
            <td class="">{{ $ujian->jam_ujian }} WITA - Selesai</td>
         </tr>
         <tr>
            <td class="title">Tempat</td>
            <td style="vertical-align: top; padding-right: 3px;">:</td>
            <td class="">{{ $ujian->tempat_ujian}}</td>
         </tr>
      </table>

      <div style="margin-top: 20px">
         <p>Dengan susunan panitia penguji sebagai berikut :</p>
      </div>
      <table>
         <tr>
            <td class="title">Ketua Sidang</td>
            <td style="vertical-align: top; padding-right: 3px;">:</td>
            <td class="">{{ $ujian->penguji_1->nama_dosen}}</td>
         </tr>
         <tr>
            <td class="title">Sekretaris</td>
            <td style="vertical-align: top; padding-right: 3px;">:</td>
            <td class="">{{ $ujian->sekretaris_sidang}}</td>
         </tr>
      </table>
      <table style="margin-top: 20px">
         <tr>
            <td class="title">Penguji I</td>
            <td style="vertical-align: top; padding-right: 3px;">:</td>
            <td class="">{{ $ujian->penguji_1->nama_dosen}}</td>
         </tr>
         <tr>
            <td class="title">Penguji II</td>
            <td style="vertical-align: top; padding-right: 3px;">:</td>
            <td class="">{{ $ujian->penguji_2->nama_dosen}}</td>
         </tr>
         <tr>
            <td class="title">Penguji III</td>
            <td style="vertical-align: top; padding-right: 3px;">:</td>
            <td class="">{{ $ujian->penguji_3->nama_dosen}}</td>
         </tr>
      </table>
      <table style="margin-top: 20px">
         <tr>
            <td class="title">Pembimbing I</td>
            <td style="vertical-align: top; padding-right: 3px;">:</td>
            <td class="">{{ $ujian->pembimbing_1->nama_dosen}}</td>
         </tr>
         <tr>
            <td class="title">Pembimbing II</td>
            <td style="vertical-align: top; padding-right: 3px;">:</td>
            <td class="">{{ $ujian->pembimbing_2->nama_dosen}}</td>
         </tr>
      </table>

      <div style="margin-top: 20px">
         <p>Demikian undangan ini kami sampaikan kepada Bapak/Ibu, atas kerjasama yang baik
            diucapkan terima kasih. </p> <br><br>
      </div>
      <table style="width: 100%; margin-top: 10px; font-size: 14px">
         <tr>
            <td style="width: 50%;"></td>
            <td style="width: 50%; text-align: right;">
               <div>
                  <p
                     style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; text-align: left">
                     <span style="font-weight: bold">An. Ketua Jurusan Teknik Informatika, <br>
                        <span style="padding-left: 26px">Sekretaris Jurusan Teknik Informatika,</span>
                     </span> <br><br><br><br><br><br>
                     @foreach ($ttd as $item)
                     <span style="font-weight: bold">{{ $item->nama_dosen}}</span> <br>
                     <span style="font-weight: bold">NIP.</span> {{ $item->nip}}
                     @endforeach
                  </p>
               </div>
            </td>
         </tr>
      </table>
   </main>
   {{-- HALAMAN 1 --}}
</body>

</html>