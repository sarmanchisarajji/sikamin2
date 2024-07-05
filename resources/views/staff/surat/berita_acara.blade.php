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
        <h3 style="text-align: center; padding-top: 60px; padding-bottom: 30px; ">
            DAFTAR HADIR SEMINAR {{ $ujian->jenis_ujian == 'proposal' ? 'PROPOSAL' : 'HASIL' }}<br />
            PEMBIMBING & PENGUJI {{ $ujian->jenis_ujian == 'proposal' ? 'PROPOSAL' : 'HASIL' }}
        </h3>
        <table style="text-align: start; width: 100%;">
            <tr>
                <td class="title">Nama </td>
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
                            <img src="./assets/img/ttd_pak.png" width="90" style="margin-left: -130px;">
                        </div>
                        <p
                            style="font-weight: bold; text-decoration:underline; text-decoration-thickness; margin-top: -60px;">
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

    {{-- HALAMAN 2 --}}
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
            KOREKSI PEMBIMBING & PENGUJI<br />
            SEMINAR {{ $ujian->jenis_ujian == 'proposal' ? 'PROPOSAL' : 'HASIL' }}
        </h3>
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
                <td style="border: 1px solid black; padding: 8px;">Halaman</td>
                <td style="width: 75%; border: 1px solid black; padding: 8px;">Koreksi</td>
            </tr>
            <tr>
                <td style="border-right: 1px solid black; padding: 8px; text-align: center; height: 50px">1.</td>
                <td style="border-right: 1px solid black; padding: 8px;"></td>
                <td style="border-right: 1px solid black; padding: 8px;"></td>
            </tr>
            <tr>
                <td style="border-right: 1px solid black; padding: 8px; text-align: center; height: 50px">2.</td>
                <td style="border-right: 1px solid black; padding: 8px;"></td>
                <td style="border-right: 1px solid black; padding: 8px;"></td>
            </tr>
            <tr>
                <td style="border-right: 1px solid black; padding: 8px; text-align: center; height: 50px">3.</td>
                <td style="border-right: 1px solid black; padding: 8px;"></td>
                <td style="border-right: 1px solid black; padding: 8px;"></td>
            </tr>
            <tr>
                <td style="border-right: 1px solid black; padding: 8px; text-align: center; height: 50px">4.</td>
                <td style="border-right: 1px solid black; padding: 8px;"></td>
                <td style="border-right: 1px solid black; padding: 8px;"></td>
            </tr>
            <tr>
                <td style="border-right: 1px solid black; padding: 8px; text-align: center; height: 50px">5.</td>
                <td style="border-right: 1px solid black; padding: 8px;"></td>
                <td style="border-right: 1px solid black; padding: 8px;"></td>
            </tr>
        </table>

        <table style="width: 100%; margin-top: 10px;">
            <tr>
                <td style="width: 55%"></td>
                <td>
                    <div style="text-align: left">
                        <p style="font-family: times new roman">Kendari,
                            {{ \Carbon\Carbon::parse($ujian->tanggal_ujian)->locale('id_ID')->isoFormat('D MMMM YYYY') }}
                        </p>
                        <p style="margin-top: 10px">
                            Dosen Ybs
                        </p>
                        <br>
                        <br>
                        <br>
                        <br>
                        <p>{{ $ujian->pembimbing_1->nama_dosen }}</p>
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
    {{-- HALAMAN 2 --}}
    {{-- HALAMAN 3 --}}
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
            KOREKSI PEMBIMBING & PENGUJI<br />
            SEMINAR {{ $ujian->jenis_ujian == 'proposal' ? 'PROPOSAL' : 'HASIL' }}
        </h3>
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
                <td style="border: 1px solid black; padding: 8px;">Halaman</td>
                <td style="width: 75%; border: 1px solid black; padding: 8px;">Koreksi</td>
            </tr>
            <tr>
                <td style="border-right: 1px solid black; padding: 8px; text-align: center; height: 50px">1.</td>
                <td style="border-right: 1px solid black; padding: 8px;"></td>
                <td style="border-right: 1px solid black; padding: 8px;"></td>
            </tr>
            <tr>
                <td style="border-right: 1px solid black; padding: 8px; text-align: center; height: 50px">2.</td>
                <td style="border-right: 1px solid black; padding: 8px;"></td>
                <td style="border-right: 1px solid black; padding: 8px;"></td>
            </tr>
            <tr>
                <td style="border-right: 1px solid black; padding: 8px; text-align: center; height: 50px">3.</td>
                <td style="border-right: 1px solid black; padding: 8px;"></td>
                <td style="border-right: 1px solid black; padding: 8px;"></td>
            </tr>
            <tr>
                <td style="border-right: 1px solid black; padding: 8px; text-align: center; height: 50px">4.</td>
                <td style="border-right: 1px solid black; padding: 8px;"></td>
                <td style="border-right: 1px solid black; padding: 8px;"></td>
            </tr>
            <tr>
                <td style="border-right: 1px solid black; padding: 8px; text-align: center; height: 50px">5.</td>
                <td style="border-right: 1px solid black; padding: 8px;"></td>
                <td style="border-right: 1px solid black; padding: 8px;"></td>
            </tr>
        </table>

        <table style="width: 100%; margin-top: 10px;">
            <tr>
                <td style="width: 55%"></td>
                <td>
                    <div style="text-align: left">
                        <p style="font-family: times new roman">Kendari,
                            {{ \Carbon\Carbon::parse($ujian->tanggal_ujian)->locale('id_ID')->isoFormat('D MMMM YYYY') }}
                        </p>
                        <p style="margin-top: 10px">
                            Dosen Ybs
                        </p>
                        <br>
                        <br>
                        <br>
                        <br>
                        <p>{{ $ujian->pembimbing_2->nama_dosen }}</p>
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
    {{-- HALAMAN 3 --}}
    {{-- HALAMAN 4 --}}
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
            KOREKSI PEMBIMBING & PENGUJI<br />
            SEMINAR {{ $ujian->jenis_ujian == 'proposal' ? 'PROPOSAL' : 'HASIL' }}
        </h3>
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
                <td style="border: 1px solid black; padding: 8px;">Halaman</td>
                <td style="width: 75%; border: 1px solid black; padding: 8px;">Koreksi</td>
            </tr>
            <tr>
                <td style="border-right: 1px solid black; padding: 8px; text-align: center; height: 50px">1.</td>
                <td style="border-right: 1px solid black; padding: 8px;"></td>
                <td style="border-right: 1px solid black; padding: 8px;"></td>
            </tr>
            <tr>
                <td style="border-right: 1px solid black; padding: 8px; text-align: center; height: 50px">2.</td>
                <td style="border-right: 1px solid black; padding: 8px;"></td>
                <td style="border-right: 1px solid black; padding: 8px;"></td>
            </tr>
            <tr>
                <td style="border-right: 1px solid black; padding: 8px; text-align: center; height: 50px">3.</td>
                <td style="border-right: 1px solid black; padding: 8px;"></td>
                <td style="border-right: 1px solid black; padding: 8px;"></td>
            </tr>
            <tr>
                <td style="border-right: 1px solid black; padding: 8px; text-align: center; height: 50px">4.</td>
                <td style="border-right: 1px solid black; padding: 8px;"></td>
                <td style="border-right: 1px solid black; padding: 8px;"></td>
            </tr>
            <tr>
                <td style="border-right: 1px solid black; padding: 8px; text-align: center; height: 50px">5.</td>
                <td style="border-right: 1px solid black; padding: 8px;"></td>
                <td style="border-right: 1px solid black; padding: 8px;"></td>
            </tr>
        </table>

        <table style="width: 100%; margin-top: 10px;">
            <tr>
                <td style="width: 55%"></td>
                <td>
                    <div style="text-align: left">
                        <p style="font-family: times new roman">Kendari,
                            {{ \Carbon\Carbon::parse($ujian->tanggal_ujian)->locale('id_ID')->isoFormat('D MMMM YYYY') }}
                        </p>
                        <p style="margin-top: 10px">
                            Dosen Ybs
                        </p>
                        <br>
                        <br>
                        <br>
                        <br>
                        <p>{{ $ujian->penguji_1->nama_dosen }}</p>
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
    {{-- HALAMAN 4 --}}
    {{-- HALAMAN 5 --}}
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
            KOREKSI PEMBIMBING & PENGUJI<br />
            SEMINAR {{ $ujian->jenis_ujian == 'proposal' ? 'PROPOSAL' : 'HASIL' }}
        </h3>
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
                <td style="border: 1px solid black; padding: 8px;">Halaman</td>
                <td style="width: 75%; border: 1px solid black; padding: 8px;">Koreksi</td>
            </tr>
            <tr>
                <td style="border-right: 1px solid black; padding: 8px; text-align: center; height: 50px">1.</td>
                <td style="border-right: 1px solid black; padding: 8px;"></td>
                <td style="border-right: 1px solid black; padding: 8px;"></td>
            </tr>
            <tr>
                <td style="border-right: 1px solid black; padding: 8px; text-align: center; height: 50px">2.</td>
                <td style="border-right: 1px solid black; padding: 8px;"></td>
                <td style="border-right: 1px solid black; padding: 8px;"></td>
            </tr>
            <tr>
                <td style="border-right: 1px solid black; padding: 8px; text-align: center; height: 50px">3.</td>
                <td style="border-right: 1px solid black; padding: 8px;"></td>
                <td style="border-right: 1px solid black; padding: 8px;"></td>
            </tr>
            <tr>
                <td style="border-right: 1px solid black; padding: 8px; text-align: center; height: 50px">4.</td>
                <td style="border-right: 1px solid black; padding: 8px;"></td>
                <td style="border-right: 1px solid black; padding: 8px;"></td>
            </tr>
            <tr>
                <td style="border-right: 1px solid black; padding: 8px; text-align: center; height: 50px">5.</td>
                <td style="border-right: 1px solid black; padding: 8px;"></td>
                <td style="border-right: 1px solid black; padding: 8px;"></td>
            </tr>
        </table>

        <table style="width: 100%; margin-top: 10px;">
            <tr>
                <td style="width: 55%"></td>
                <td>
                    <div style="text-align: left">
                        <p style="font-family: times new roman">Kendari,
                            {{ \Carbon\Carbon::parse($ujian->tanggal_ujian)->locale('id_ID')->isoFormat('D MMMM YYYY') }}
                        </p>
                        <p style="margin-top: 10px">
                            Dosen Ybs
                        </p>
                        <br>
                        <br>
                        <br>
                        <br>
                        <p>{{ $ujian->penguji_2->nama_dosen }}</p>
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
    {{-- HALAMAN 5 --}}
    {{-- HALAMAN 6 --}}
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
            KOREKSI PEMBIMBING & PENGUJI<br />
            SEMINAR {{ $ujian->jenis_ujian == 'proposal' ? 'PROPOSAL' : 'HASIL' }}
        </h3>
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
                <td style="border: 1px solid black; padding: 8px;">Halaman</td>
                <td style="width: 75%; border: 1px solid black; padding: 8px;">Koreksi</td>
            </tr>
            <tr>
                <td style="border-right: 1px solid black; padding: 8px; text-align: center; height: 50px">1.</td>
                <td style="border-right: 1px solid black; padding: 8px;"></td>
                <td style="border-right: 1px solid black; padding: 8px;"></td>
            </tr>
            <tr>
                <td style="border-right: 1px solid black; padding: 8px; text-align: center; height: 50px">2.</td>
                <td style="border-right: 1px solid black; padding: 8px;"></td>
                <td style="border-right: 1px solid black; padding: 8px;"></td>
            </tr>
            <tr>
                <td style="border-right: 1px solid black; padding: 8px; text-align: center; height: 50px">3.</td>
                <td style="border-right: 1px solid black; padding: 8px;"></td>
                <td style="border-right: 1px solid black; padding: 8px;"></td>
            </tr>
            <tr>
                <td style="border-right: 1px solid black; padding: 8px; text-align: center; height: 50px">4.</td>
                <td style="border-right: 1px solid black; padding: 8px;"></td>
                <td style="border-right: 1px solid black; padding: 8px;"></td>
            </tr>
            <tr>
                <td style="border-right: 1px solid black; padding: 8px; text-align: center; height: 50px">5.</td>
                <td style="border-right: 1px solid black; padding: 8px;"></td>
                <td style="border-right: 1px solid black; padding: 8px;"></td>
            </tr>
        </table>

        <table style="width: 100%; margin-top: 10px;">
            <tr>
                <td style="width: 55%"></td>
                <td>
                    <div style="text-align: left">
                        <p style="font-family: times new roman">Kendari,
                            {{ \Carbon\Carbon::parse($ujian->tanggal_ujian)->locale('id_ID')->isoFormat('D MMMM YYYY') }}
                        </p>
                        <p style="margin-top: 10px">
                            Dosen Ybs
                        </p>
                        <br>
                        <br>
                        <br>
                        <br>
                        <p>{{ $ujian->penguji_3->nama_dosen }}</p>
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
    {{-- HALAMAN 6 --}}
</body>

</html>
