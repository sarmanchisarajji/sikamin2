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
      padding: 20px
   }

   main {
      padding-right: 60px;
      padding-left: 60px;
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
      <h3 style="text-align: center; padding: 100px 0 60px 0; text-decoration: underline">PENILAIAN
         UJIAN AKHIR (SKRIPSI)</h3>
      <table style="text-align: start; width: 100%;">
         <tr>
            <td class="title">Nama Mahasiswa</td>
            <td style="vertical-align: top; padding-right: 3px;">:</td>
            <td class="">{{ $ujian->mahasiswa->nama }}</td>
         </tr>
         <tr class="">
            <td class="title">Nomor Stambuk</td>
            <td style="vertical-align: top; padding-right: 3px">:</td>
            <td class="">{{ $ujian->mahasiswa->nim }}</td>
         </tr>
         <tr class="">
            <td class="title">Program Studi</td>
            <td style="vertical-align: top; padding-right: 3px">:</td>
            <td class="">S - 1 TEKNIK INFORMATIKA</td>
         </tr>
         <tr>
            <td class="title" style="padding-top: 5px">Judul Tugas Akhir</td>
            <td style="vertical-align: top; padding-right: 3px; padding-top: 5px">:</td>
            <td style="font-style: italic; padding-top: 5px">{{ $ujian->judul }}</td>
         </tr>
         <tr class="">
            <td class="title" style="padding-top: 5px">Dosen Pembimbing</td>
            <td style="vertical-align: top; padding-right: 3px; padding-top: 5px">:</td>
            <td style="padding-top: 5px;">
               <span style="padding-bottom: 10px; display: block;">1. {{ $ujian->pembimbing_1->nama_dosen }} </span>
               <span style="display: block;">2. {{ $ujian->pembimbing_2->nama_dosen }}</span>
            </td>
         </tr>
         <tr>
            <td class="title" style="padding-top: 5px">Hari / Tanggal</td>
            <td style="vertical-align: top; padding-right: 3px; padding-top: 5px">:</td>
            <td style="padding-top: 5px">{{
               \Carbon\Carbon::parse($ujian->tanggal_ujian)->locale('id_ID')->isoFormat('dddd, D MMMM YYYY') }}</td>
         </tr>
      </table>
      <table style="margin-top: 20px">
         <tr>
            <td style="vertical-align: top; padding-right: 20px; padding-top: 10px">Nilai</td>
            <td style="vertical-align: top; padding-right: 3px; padding-top: 10px">:</td>
            <td>
               <table>
                  <tr>
                     <td style="width: 150px; padding-top: 10px">1. Sistem Penulisan</td>
                     <td style="padding-top: 10px">:</td>
                  </tr>
               </table>
               <table>
                  <tr>
                     <td style="padding-bottom: 15px; width: 150px; padding-top: 15px">2. Penguasaan Materi</td>
                     <td style="padding-bottom: 15px;">:</td>
                  </tr>
               </table>
               <table>
                  <tr>
                     <td style="padding-bottom: 15px; width: 150px">3. Cara Persentase</td>
                     <td style="padding-bottom: 15px;">:</td>
                  </tr>
               </table>
               <table>
                  <tr>
                     <td style="padding-bottom: 15px; width: 150px">4. Penampilan</td>
                     <td style="padding-bottom: 15px;">:</td>
                  </tr>
               </table>
               <table>
                  <tr>
                     <td style="padding-bottom: 15px; width: 150px">5. Jawaban Pertanyaan</td>
                     <td style="padding-bottom: 15px;">:</td>
                  </tr>
               </table>
               <table>
                  <tr>
                     <td style="padding-top: 15px; width: 150px">NILAI UJIAN AKHIR</td>
                     <td style="padding-top: 15px;">:</td>
                  </tr>
               </table>
            </td>
         </tr>
      </table>

      <table style="width: 100%; margin-top: 30px;">
         <tr>
            <td style="width: 55%"></td>
            <td>
               <div style="text-align: left">
                  <p style="padding-bottom: 20px">Kendari, 22 Desember 2023</p>
                  <p>Dosen Penilai,</p>
                  <br>
                  <br>
                  <br>
                  <br>
                  <p>(...........................................)</p>
                  <p>NIP.</p>
               </div>
            </td>
         </tr>
      </table>

      <div style="margin-top: 50px">
         <p>Pedoman Penilaian</p>
         <table>
            <tr>
               <td style="padding-right: 20px">•</td>
               <td>81 – 100</td>
               <td style="padding: 0 10px 0 10px">=</td>
               <td>(A)</td>
            </tr>
            <tr>
               <td style="padding-right: 20px">•</td>
               <td>61 – 80</td>
               <td style="padding: 0 10px 0 10px">=</td>
               <td>(B)</td>
            </tr>
            <tr>
               <td style="padding-right: 20px">•</td>
               <td>41 – 60</td>
               <td style="padding: 0 10px 0 10px">=</td>
               <td>(C)</td>
            </tr>
            <tr>
               <td style="padding-right: 20px">•</td>
               <td>&lt; 40</td>
               <td style="padding: 0 10px 0 10px">=</td>
               <td>(E)</td>
            </tr>
         </table>
      </div>
   </main>
</body>

</html>