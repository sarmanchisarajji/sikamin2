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
      font-size: 12px;
      font-family: Arial, Helvetica, sans-serif
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
   <main style="border: 0.5px solid black; margin: 40px 0 20px 0;">
      <div style="border-bottom: 0.5px solid black">
         <p style="text-align: center; padding: 20px 0">BERITA ACARA UJIAN TUGAS AKHIR (SKRIPSI)</p>
      </div>
      <div style="border-bottom: 0.5px solid black">
         <p style="padding: 5px 10px"><span style="padding-right: 10px">I.</span> PENYUSUN TUGAS AKHIR
         </p>
      </div>
      <div style="border-bottom: 0.5px solid black; padding: 10px 0">
         <table>
            <tr>
               <td style="width: 80px; padding-left: 10px">Nama</td>
               <td style="padding-right: 10px">:</td>
               <td>{{ $ujian->mahasiswa->nama }}</td>
            </tr>
         </table>
      </div>
      <div style="border-bottom: 0.5px solid black; padding: 10px 0">
         <table>
            <tr>
               <td style="width: 80px; padding-left: 10px">NIM</td>
               <td style="padding-right: 10px">:</td>
               <td>{{ $ujian->mahasiswa->nim }}</td>
            </tr>
         </table>
      </div>
      <div style="border-bottom: 0.5px solid black">
         <p style="padding: 5px 10px"><span style="padding-right: 10px">II.</span> TUGAS AKHIR
         </p>
      </div>
      <div style="border-bottom: 0.5px solid black; padding: 15px 0">
         <table>
            <tr>
               <td style="width: 80px; padding-left: 10px">Judul</td>
               <td style="padding-right: 10px">:</td>
               <td>{{ $ujian->judul }}</td>
            </tr>
         </table>
      </div>
      <div style="border-bottom: 0.5px solid black; padding: 15px 0">
         <table>
            <tr>
               <td style="width: 80px; padding-left: 10px">Pembimbing</td>
               <td style="padding-right: 10px">:</td>
               <td>
                  <p style="padding-bottom: 15px">{{ $ujian->pembimbing_1->nama_dosen }}</p>
                  <p>{{ $ujian->pembimbing_2->nama_dosen }}</p>
               </td>
            </tr>
         </table>
      </div>
      <div style="border-bottom: 0.5px solid black">
         <p style="padding: 5px 10px"><span style="padding-right: 10px">III.</span> TIM PENGUJI :</p>
         <div style="padding: 0 10px">
            <table style="width: 100%; border-collapse: collapse; margin-top: 10px">
               <tr style="text-align: center; font-weight: bold; border: 0.5px solid black">
                  <td style="width: 5%; padding: 8px; border: 0.5px solid black;">No</td>
                  <td style="width: 20%; padding: 8px; border: 0.5px solid black;">NIP</td>
                  <td style="width: 30%; padding: 8px; border: 0.5px solid black;">Nama</td>
                  <td style="width: 30%; padding: 8px; border: 0.5px solid black;" colspan="2">Jabatan dalam sidang</td>
                  <td style="width: 15%; padding: 8px; border: 0.5px solid black;">Tanda Tangan</td>
               </tr>
               <tr>
                  <td style="padding: 8px; border: 0.5px solid black;">1</td>
                  <td style="padding: 8px; border: 0.5px solid black;">{{ $ujian->pembimbing_1->nip }}</td>
                  <td style="padding: 8px; border: 0.5px solid black;">{{ $ujian->pembimbing_1->nama_dosen }}</td>
                  <td style="padding: 8px; border: 0.5px solid black;">Pembimbing I</td>
                  <td style="padding: 8px; border: 0.5px solid black; width: 8%">*)</td>
                  <td style="padding: 8px; border: 0.5px solid black;"></td>
               </tr>
               <tr>
                  <td style="padding: 8px; border: 0.5px solid black;">2</td>
                  <td style="padding: 8px; border: 0.5px solid black;">{{ $ujian->pembimbing_2->nip }}</td>
                  <td style="padding: 8px; border: 0.5px solid black;">{{ $ujian->pembimbing_2->nama_dosen }}</td>
                  <td style="padding: 8px; border: 0.5px solid black;">Pembimbing II</td>
                  <td style="padding: 8px; border: 0.5px solid black;">**)</td>
                  <td style="padding: 8px; border: 0.5px solid black;"></td>
               </tr>
               <tr>
                  <td style="padding: 8px; border: 0.5px solid black;">3</td>
                  <td style="padding: 8px; border: 0.5px solid black;">{{ $ujian->penguji_1->nip }}</td>
                  <td style="padding: 8px; border: 0.5px solid black;">{{ $ujian->penguji_1->nama_dosen }}</td>
                  <td style="padding: 8px; border: 0.5px solid black;">Penguji I (Ketua Sidang)</td>
                  <td style="padding: 8px; border: 0.5px solid black;">***)</td>
                  <td style="padding: 8px; border: 0.5px solid black;"></td>
               </tr>
               <tr>
                  <td style="padding: 8px; border: 0.5px solid black;">4</td>
                  <td style="padding: 8px; border: 0.5px solid black;">{{ $ujian->penguji_2->nip }}</td>
                  <td style="padding: 8px; border: 0.5px solid black;">{{ $ujian->penguji_2->nama_dosen }}</td>
                  <td style="padding: 8px; border: 0.5px solid black;">Penguji II (Sekretaris Sidang)</td>
                  <td style="padding: 8px; border: 0.5px solid black;">****)</td>
                  <td style="padding: 8px; border: 0.5px solid black;"></td>
               </tr>
               <tr>
                  <td style="padding: 8px; border: 0.5px solid black;">4</td>
                  <td style="padding: 8px; border: 0.5px solid black;">{{ $ujian->penguji_3->nip }}</td>
                  <td style="padding: 8px; border: 0.5px solid black;">{{ $ujian->penguji_3->nama_dosen }}</td>
                  <td style="padding: 8px; border: 0.5px solid black;">Penguji III</td>
                  <td style="padding: 8px; border: 0.5px solid black;">*****)</td>
                  <td style="padding: 8px; border: 0.5px solid black;"></td>
               </tr>
            </table>
         </div>
         <div style="border-bottom: 0.5px solid black">
            <p style="padding: 5px 10px"><span style="padding-right: 10px">IV.</span> TEMPAT DAN WAKTU
            </p>
         </div>
         <div style="border-bottom: 0.5px solid black; padding: 10px 0">
            <table>
               <tr>
                  <td style="width: 80px; padding-left: 10px">Ruang</td>
                  <td style="padding-right: 10px">:</td>
                  <td>
                     <p>{{ $ujian->tempat_ujian }}</p>
                  </td>
               </tr>
            </table>
         </div>
         <div style="border-bottom: 0.5px solid black; padding: 10px 0">
            <table>
               <tr>
                  <td style="width: 80px; padding-left: 10px">Hari/Tanggal</td>
                  <td style="padding-right: 10px">:</td>
                  <td>
                     <p>{{ \Carbon\Carbon::parse($ujian->tanggal_ujian)->locale('id_ID')->isoFormat('dddd, D MMMM YYYY')
                        }}</p>
                  </td>
               </tr>
            </table>
         </div>
         <div style="border-bottom: 0.5px solid black; padding: 10px 0">
            <table>
               <tr>
                  <td style="width: 80px; padding-left: 10px">Waktu</td>
                  <td style="padding-right: 10px">:</td>
                  <td>
                     <p>{{ $ujian->jam_ujian }} – Selesai</p>
                  </td>
               </tr>
            </table>
         </div>
         <div style="border-bottom: 0.5px solid black">
            <p style="padding: 10px 15px"><span style="padding-right: 10px">V.</span> HASIL EVALUASI :
            </p>
         </div>
         <div style="border-bottom: 0.5px solid black">
            <p style="padding: 10px 15px "><span style="padding-right: 10px">VI.</span> CATATAN :
            </p>
         </div>
         <table style="width: 100%">
            <tr>
               <td style="width: 60%"></td>
               <td style="width: 40%">
                  <table>
                     <tr>
                        <td>Kendari, {{ \Carbon\Carbon::parse($ujian->tanggal_ujian)->locale('id_ID')->isoFormat('D MMMM
                           YYYY')
                           }}</td>
                     </tr>
                     <tr>
                        <td>
                           Ketua Tim Penguji,
                        </td>
                     </tr>
                  </table>
                  <br>
                  <br>
                  <br>
                  <br>
                  <table>
                     <tr>
                        <td>
                           <p style="font-style: bold">{{ $ujian->penguji_1->nama_dosen }}</p>
                           <p>{{ $ujian->penguji_1->nip }}</p>
                        </td>
                     </tr>
                  </table>
               </td>
            </tr>
         </table>

      </div>
   </main>
   <div>
      <table>
         <tr>
            <td style="padding-right: 25px">*)</td>
            <td>Pembimbing I</td>
         </tr>
         <tr>
            <td>**)</td>
            <td>Pembimbing II</td>
         </tr>
         <tr>
            <td>***)</td>
            <td>Ketua Sidang</td>
         </tr>
         <tr>
            <td>****)</td>
            <td>Penguji II</td>
         </tr>
         <tr>
            <td>*****)</td>
            <td>Penguji III</td>
         </tr>
      </table>
   </div>
</body>

</html>