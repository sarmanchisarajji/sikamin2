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
                        <td style="width: 30%; padding: 8px; border: 0.5px solid black;" colspan="2">Jabatan dalam
                            sidang</td>
                        <td style="width: 15%; padding: 8px; border: 0.5px solid black;">Tanda Tangan</td>
                    </tr>
                    <tr>
                        <td style="padding: 8px; border: 0.5px solid black;">1</td>
                        <td style="padding: 8px; border: 0.5px solid black;">
                            {{ $ujian->pembimbing_1->nip == null ? $ujian->pembimbing_1->nidn : $ujian->pembimbing_1->nip }}
                        </td>
                        <td style="padding: 8px; border: 0.5px solid black;">{{ $ujian->pembimbing_1->nama_dosen }}</td>
                        <td style="padding: 8px; border: 0.5px solid black;">Pembimbing I</td>
                        <td style="padding: 8px; border: 0.5px solid black; width: 8%">*)</td>
                        <td style="padding: 8px; border: 0.5px solid black;"></td>
                    </tr>
                    <tr>
                        <td style="padding: 8px; border: 0.5px solid black;">2</td>
                        <td style="padding: 8px; border: 0.5px solid black">
                            {{ $ujian->pembimbing_2->nip == null ? $ujian->pembimbing_2->nidn : $ujian->pembimbing_2->nip }}
                        </td>
                        <td style="padding: 8px; border: 0.5px solid black;">{{ $ujian->pembimbing_2->nama_dosen }}</td>
                        <td style="padding: 8px; border: 0.5px solid black;">Pembimbing II</td>
                        <td style="padding: 8px; border: 0.5px solid black;">**)</td>
                        <td style="padding: 8px; border: 0.5px solid black;"></td>
                    </tr>
                    <tr>
                        <td style="padding: 8px; border: 0.5px solid black;">3</td>
                        <td style="padding: 8px; border: 0.5px solid black;">
                            {{ $ujian->penguji_1->nip == null ? $ujian->penguji_1->nidn : $ujian->penguji_1->nip }}
                        </td>
                        <td style="padding: 8px; border: 0.5px solid black;">{{ $ujian->penguji_1->nama_dosen }}</td>
                        <td style="padding: 8px; border: 0.5px solid black;">Penguji I (Ketua Sidang)</td>
                        <td style="padding: 8px; border: 0.5px solid black;">***)</td>
                        <td style="padding: 8px; border: 0.5px solid black;"></td>
                    </tr>
                    <tr>
                        <td style="padding: 8px; border: 0.5px solid black;">4</td>
                        <td style="padding: 8px; border: 0.5px solid black;">
                            {{ $ujian->penguji_2->nip == null ? $ujian->penguji_2->nidn : $ujian->penguji_2->nip }}
                        </td>
                        <td style="padding: 8px; border: 0.5px solid black;">{{ $ujian->penguji_2->nama_dosen }}</td>
                        <td style="padding: 8px; border: 0.5px solid black;">Penguji II (Sekretaris Sidang)</td>
                        <td style="padding: 8px; border: 0.5px solid black;">****)</td>
                        <td style="padding: 8px; border: 0.5px solid black;"></td>
                    </tr>
                    <tr>
                        <td style="padding: 8px; border: 0.5px solid black;">4</td>
                        <td style="padding: 8px; border: 0.5px solid black;">
                            {{ $ujian->penguji_3->nip == null ? $ujian->penguji_3->nidn : $ujian->penguji_3->nip }}
                        </td>
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
                            <p>{{ \Carbon\Carbon::parse($ujian->tanggal_ujian)->locale('id_ID')->isoFormat('dddd, D MMMM YYYY') }}
                            </p>
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
                                <td>Kendari,
                                    {{ \Carbon\Carbon::parse($ujian->tanggal_ujian)->locale('id_ID')->isoFormat('D MMMM
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       YYYY') }}
                                </td>
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
                                    @if ($ujian->penguji_1->nip)
                                        <p>NIP. {{ $ujian->penguji_1->nip }}</p>
                                    @else
                                        <p>NIDN. {{ $ujian->penguji_1->nidn }}</p>
                                    @endif
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
        <h3 style="text-align: center; padding-top: 60px; padding-bottom: 30px; ">
            DAFTAR HADIR UJIAN SKRIPSI<br />
            PEMBIMBING & PENGUJI
        </h3>
        <table style="text-align: start; width: 100%;">
            <tr>
                <td class="title">Nama Mahasiswa </td>
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
                    <span style="padding-bottom: 10px; display: block;">1. {{ $ujian->pembimbing_1->nama_dosen }}
                    </span>
                    <span style="display: block;">2. {{ $ujian->pembimbing_2->nama_dosen }}</span>
                </td>
            </tr>
            <tr>
                <td class="title" style="padding-top: 5px">Hari / Tanggal</td>
                <td style="vertical-align: top; padding-right: 3px; padding-top: 5px">:</td>
                <td style="padding-top: 5px">
                    {{ \Carbon\Carbon::parse($ujian->tanggal_ujian)->locale('id_ID')->isoFormat('dddd, D MMMM YYYY') }}
                </td>
            </tr>
        </table>

        <table style="width: 100%; border-collapse: collapse; border: 1px solid black; margin-top: 10px">
            <tr style="text-align: center; font-weight: bold">
                <td style="width: 5%; border: 1px solid black; padding: 8px;">No</td>
                <td style="width: 50%; border: 1px solid black; padding: 8px;">Nama Dosen</td>
                <td style="width: 30%;border: 1px solid black; padding: 8px;">Keterangan</td>
                <td style="border: 1px solid black; padding: 8px;">Tanda <br>Tangan/Paraf</td>
            </tr>
            <tr>
                <td style="border-right: 1px solid black; padding: 8px; text-align: center; height: 50px">1.</td>
                <td style="border-right: 1px solid black; padding: 8px;">{{ $ujian->pembimbing_1->nama_dosen }}</td>
                <td style="border-right: 1px solid black; padding: 8px;">Pembimbing 1</td>
                <td style="border-right: 1px solid black; padding: 8px;">1.</td>
            </tr>
            <tr>
                <td style="border-right: 1px solid black; padding: 8px; text-align: center; height: 50px">2.</td>
                <td style="border-right: 1px solid black; padding: 8px;">{{ $ujian->pembimbing_2->nama_dosen }}</td>
                <td style="border-right: 1px solid black; padding: 8px;">Pembimbing 2</td>
                <td style="border-right: 1px solid black; padding: 8px;">2.</td>
            </tr>
            <tr>
                <td style="border-right: 1px solid black; padding: 8px; text-align: center; height: 50px">3.</td>
                <td style="border-right: 1px solid black; padding: 8px;">{{ $ujian->penguji_1->nama_dosen }}</td>
                <td style="border-right: 1px solid black; padding: 8px;">Penguji 1</td>
                <td style="border-right: 1px solid black; padding: 8px;">3.</td>
            </tr>
            <tr>
                <td style="border-right: 1px solid black; padding: 8px; text-align: center; height: 50px">4.</td>
                <td style="border-right: 1px solid black; padding: 8px;">{{ $ujian->penguji_2->nama_dosen }}</td>
                <td style="border-right: 1px solid black; padding: 8px;">Penguji 2</td>
                <td style="border-right: 1px solid black; padding: 8px;">4.</td>
            </tr>
            <tr>
                <td style="border-right: 1px solid black; padding: 8px 8px 30px 8px; text-align: center; height: 50px">
                    5.</td>
                <td style="border-right: 1px solid black; padding: 8px 8px 30px 8px;">
                    {{ $ujian->penguji_3->nama_dosen }}</td>
                <td style="border-right: 1px solid black; padding: 8px 8px 30px 8px;">Penguji 3</td>
                <td style="border-right: 1px solid black; padding: 8px 8px 30px 8px;">5.</td>
            </tr>
        </table>

        <table style="width: 100%; margin-top: 20px;">
            <tr>
                <td style="width: 55%"></td>
                <td>
                    <div style="text-align: left">
                        <p>Ketua Jurusan Teknik Informatika</p>
                        <div class="signature-container">
                            <img src="./assets/img/jurusan.png" width="160" style="margin-top: 40px">
                            <img src="./assets/img/ttd_pak.png" width="90" style="margin-left: -100px;">
                        </div>
                        <p
                            style="font-weight: bold; text-decoration:underline; text-decoration-thickness: 3px; margin-top: -60px;">
                            {{ $ujian->nama_ttd }}
                        </p>
                        @foreach ($ttd as $item)
                            @if ($item->nama_dosen === $ujian->nama_ttd)
                                <p>NIP. {{ $item->nip }}</p>
                            @endif
                        @endforeach
                    </div>
                </td>
            </tr>
        </table>
    </main>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    {{-- HALAMAN 1 --}}
</body>

</html>
