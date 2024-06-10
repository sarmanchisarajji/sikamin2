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
        padding-right: 70px;
        padding-left: 70px;
    }

    main {
        font-family: 'Times New Roman', Times, serif margin-top: 50px;
        font-size: 16px
    }

    footer {
        font-family: 'Times New Roman', Times, serif margin-top: 50px;
        font-size: 16px
    }
</style>

<body>
    {{-- HALAMAN 1 --}}
    <header style="margin-top: 30px">
        <table style="width: 100%">
            <tr style="text-align: center">
                <img src="./assets/img/logo-uho.png" alt="logo-uho" width="85">
                <P style="font-weight: bold; padding-top: 5px">KEPUTUSAN</P>
                <p style="padding-top: 10px">DEKAN FAKULTAS UNIVERSITAS HALU OLEO</p>
                @if ($ujian->no_sk_pembimbing == null)
                    <p style="padding-top: 5px">NOMOR : /UN29.10/PP/{{ date('Y') }}</p>
                @else
                    <p style="padding-top: 5px">NOMOR : {{ $ujian->no_sk_pembimbing }}/UN29.10/PP/{{ date('Y') }}</p>
                @endif
                <p style="padding: 10px 0 5px 0">TENTANG</p>
                <p style="font-weight: bold">PENETAPAN DOSEN PEMBIMBING PENULISAN SKRIPSI MAHASISWA <br>
                    PROGRAM STUDI TEKNIK INFORMATIKA SEMESTER GANJIL 2023/2024</p>
                <p style="padding: 10px 0 5px 0">DEKAN FAKULTAS TEKNIK UNIVERSITAS HALU OLEO,</p>
            </tr>
        </table>
    </header>

    <main>
        <table style="width: 100%">
            <tr>
                <td style="vertical-align: top; padding-right: 3px">Menimbang</td>
                <td style="vertical-align: top; padding-right: 3px">:</td>
                <td>
                    <table>
                        <tr>
                            <td style="vertical-align: top; padding-right: 8px">1.</td>
                            <td style="text-align: justify">bahwa dalam rangka penyelesaian studi mahasiswa Fakultas
                                Teknik
                                Universitas Halu Oleo,
                                dipandang perlu menetapkan nama-nama dosen
                                pembimbing penulisan skripsi mahasiswa;</td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-right: 8px">2.</td>
                            <td style="text-align: justify">bahwa untuk maksud tersebut perlu ditetapkan dengan Surat
                                Keputusan.</td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="vertical-align: top; padding-right: 3px">Mengingat</td>
                <td style="vertical-align: top; padding-right: 10px">:</td>
                <td>
                    <table>
                        <tr>
                            <td style="vertical-align: top; padding-right: 8px">1.</td>
                            <td style="text-align: justify">Undang-Undang No. 20 Tahun 2003 tentang Sistem Pendidikan
                                Nasional;
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-right: 8px">2.</td>
                            <td style="text-align: justify">Peraturan Pemerintah Nomor: 66 Tahun 2010 tentang
                                Pengelolaan dan
                                Penyelenggaraan Pendidikan;</td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-right: 8px">3.</td>
                            <td style="text-align: justify">Keputusan Presiden R.I. Nomor : 37 Tahun 1981 tentang
                                Pendirian
                                Universitas Halu Oleo;</td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-right: 8px">4.</td>
                            <td style="text-align: justify">Permendikbud No.: 149 Tahun 2014 tentang Organisasi dan Tata
                                Kerja
                                Universitas Halu Oleo;</td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-right: 8px">5.</td>
                            <td style="text-align: justify">Keputusan Menteri Pendidikan, Kebudayaan, Riset dan
                                Teknologi Nomor
                                :
                                43256/MPK.A/KP.07.00/2021 tentang Pengangkatan Rektor Universitas
                                Halu Oleo periode 2021-2025;</td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-right: 8px">6.</td>
                            <td style="text-align: justify">Keputusan Mendiknas R.I. Nomor : 43 Tahun 2012 tentang
                                Statuta
                                Universitas Halu Oleo;</td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-right: 8px">7.</td>
                            <td style="text-align: justify">Keputusan Rektor Universitas Halu Oleo No: 1564/UN29/2022
                                tentang
                                Pengangkatan Dekan Fakultas Teknik UHO Periode 2022-2026;</td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-right: 8px">8.</td>
                            <td style="text-align: justify">Peraturan Rektor Universitas Halu Oleo Tahun 2019 tentang
                                Tata
                                Naskah
                                Dinas Lingkup Universitas Halu Oleo;</td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-right: 8px">9.</td>
                            <td style="text-align: justify">Permenpan No.: 17 Tahun 2013 tentang Jabatan Fungsional
                                Dosen dan
                                Angka Kreditnya. </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="vertical-align: top; padding-right: 3px">Memperhatikan</td>
                <td style="vertical-align: top; padding-right: 3px">:</td>
                <td>
                    <table>
                        <tr>
                            <td style="vertical-align: top; padding-right: 8px">1.</td>
                            <td style="text-align: justify">Peraturan Rektor Universitas Halu Oleo, No.: 1 Tahun 2019
                                tentang
                                Peraturan Akademik UHO;</td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-right: 8px">2.</td>
                            <td style="text-align: justify">Usulan Prodi Teknik Informatika tentang tim pembimbing
                                penulisan
                                skripsi mahasiswa.</td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: center;">
                    <p>MEMUTUSKAN:</p>
                </td>
            </tr>
            <tr>
                <td style="vertical-align: top; padding-right: 3px">Menetapkan</td>
                <td style="vertical-align: top; padding-right: 3px">:</td>
                <td>
                    <table>
                        <tr>
                            <td style="text-align: justify">KEPUTUSAN DEKAN FAKULTAS TEKNIK UNIVERSTAS HALU OLEO TENTANG
                                PENETAPAN DOSEN PEMBIMBING PENULISAN SKRIPSI MAHASISWA
                                PROGRAM STUDI TEKNIK INFORMATIKA FAKULTAS TEKNIK UHO;</td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="vertical-align: top; padding-right: 3px">KESATU</td>
                <td style="vertical-align: top; padding-right: 3px">:</td>
                <td>
                    <table>
                        <tr>
                            <td style="text-align: justify">Dosen pembimbing bertugas membimbing mahasiswa dalam
                                penyusunan
                                skirpsi sampai selesai;</td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="vertical-align: top; padding-right: 3px">KEDUA</td>
                <td style="vertical-align: top; padding-right: 3px">:</td>
                <td>
                    <table>
                        <tr>
                            <td style="text-align: justify">Konsekuensi keuangan yang timbul sebagai akibat dari Surat
                                Keputusan ini
                                dibebankan pada anggaran DIPA UHO;</td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="vertical-align: top; padding-right: 3px">KETIGA</td>
                <td style="vertical-align: top; padding-right: 3px">:</td>
                <td>
                    <table>
                        <td style="text-align: justify">Surat keputusan ini mulai berlaku sejak tanggal ditetapkan dan
                            apabila
                            terdapat kekeliruan dalam surat keputusan ini akan diadakan perbaikan
                            sebagaimana mestinya.</td>
            </tr>
        </table>
    </main>
    <footer>
        <table style="width: 100%">
            <tr>
                <td style="width: 60%"></td>
                <td style="width: 40%">
                    <table>
                        <tr>
                            <td>Ditetapkan di</td>
                            <td style="vertical-align: top; padding: 0 8px 0 8px">:</td>
                            <td>Kendari</td>
                        </tr>
                        <tr>
                            <td>Pada tanggal</td>
                            <td style="vertical-align: top; padding: 0 8px 0 8px">:</td>
                            <td>25 Agustus 2023</td>
                        </tr>
                        <tr>
                            <td>DEKAN,</td>
                        </tr>
                    </table>
                    <br>
                    <br>
                    <br>
                    <br>
                    <table>
                        <tr>
                            <td>
                                <p style="font-style: bold">DR. IR. EDWARD NGII, ST., MT.</p>
                                <p>NIP. 197202121998021001</p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </footer>
    {{-- HALAMAN 1 --}}
    {{-- HALAMAN 2 --}}
    <header>
        <div style="margin-top: 100px; text-align: center">
            <p style="font-weight: bold">LAMPIRAN</p>
        </div>
        <table style="width: 100%; margin-bottom: 25px;">
            <tr>
                <td style="width: 40%"></td>
                <td style="width: 60%">
                    <table>
                        <tr>
                            <td>KEPUTUSAN</td>
                            <td style="vertical-align: top; padding: 0 8px 0 8px">:</td>
                            <td>DEKAN FAKULTAS TEKNIK UHO</td>
                        </tr>
                        <tr>
                            <td>NOMOR</td>
                            <td style="vertical-align: top; padding: 0 8px 0 8px">:</td>
                            <td>{!! $ujian->no_sk_pembimbing ? $ujian->no_sk_pembimbing : ' /UN29.10/PP/2023' !!}</td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top;">TENTANG</td>
                            <td style="vertical-align: top; padding: 0 8px 0 8px">:</td>
                            <td style="text-align: justify">PENETAPAN DOSEN PEMBIMBING
                                PENULISAN SKRIPSI MAHASISWA
                                PROGRAM STUDI TEKNIK INFORMATIKA
                                SEMESTER GANJIL 2023/2024.</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </header>
    <main>
        <table style="width: 100%; border-collapse: collapse; margin-top: 10px">
            <tr style="text-align: center; font-weight: bold; background-color: #f2f2f2;">
                <td style="width: 5%; border: 0.5px solid black; padding: 8px;">No</td>
                <td style="width: 35%; border: 0.5px solid black; padding: 8px;">Dosen Pembimbing</td>
                <td style="width: 35%; border: 0.5px solid black; padding: 8px;">NIP/PANGKAT/GOL</td>
                <td style="width: 25%; border: 0.5px solid black; padding: 8px;">JABATAN</td>
            </tr>
            <tr style="text-align: left;">
                <td style="width: 5%; border: 0.5px solid black; padding: 8px; text-align: center">1.</td>
                <td style="width: 35%; border: 0.5px solid black; padding: 8px;">{{ $ujian->pembimbing_1->nama_dosen }}
                </td>
                <td style="width: 35%; border: 0.5px solid black; padding: 8px;">
                    @if ($ujian->pembimbing_1->nip)
                        NIP. {{ $ujian->pembimbing_1->nip }}
                    @else
                        NIDN. {{ $ujian->pembimbing_1->nidn }}
                    @endif
                    <br>
                    {{ $ujian->pembimbing_1->pangkat }}
                </td>
                <td style="width: 25%; border: 0.5px solid black; padding: 8px; text-align: center">Pembimbing I</td>
            </tr>
            <tr style="text-align: left;">
                <td style="width: 5%; border: 0.5px solid black; padding: 8px; text-align: center">2.</td>
                <td style="width: 35%; border: 0.5px solid black; padding: 8px;">{{ $ujian->pembimbing_2->nama_dosen }}
                </td>
                <td style="width: 35%; border: 0.5px solid black; padding: 8px;">
                    @if ($ujian->pembimbing_2->nip)
                        NIP. {{ $ujian->pembimbing_2->nip }}
                    @else
                        NIDN. {{ $ujian->pembimbing_2->nidn }}
                    @endif
                    <br>
                    {{ $ujian->pembimbing_2->pangkat }}
                </td>
                <td style="width: 25%; border: 0.5px solid black; padding: 8px; text-align: center">Pembimbing II</td>
            </tr>
        </table>
        <div style="padding: 30px 0 20px 0; text-align: justify">
            Ditetapkan Sebagai Dosen Pembimbing Penulisan Skripsi Mahasiswa Program Studi Teknik
            Informatika berikut:
        </div>
        <table style="width: 100%; border-collapse: collapse; border: 0.5px solid black; margin-top: 10px">
            <tr style="text-align: center; font-weight: bold; background-color: #f2f2f2;">
                <td style="width: 5%; border: 0.5px solid black; padding: 8px;">No</td>
                <td style="width: 35%; border: 0.5px solid black; padding: 8px;">NAMA MAHASISWA/NIM</td>
                <td style="width: 35%; border: 0.5px solid black; padding: 8px;">JUDUL SKRIPSI</td>
            </tr>
            <tr style="text-align: left;">
                <td
                    style="width: 5%; border: 0.5px solid black; padding: 8px; text-align: center; vertical-align: top;">
                    1.
                </td>
                <td style="width: 35%; border: 0.5px solid black; padding: 8px; vertical-align: top;">
                    {{ $ujian->mahasiswa->nama }}
                    <br>
                    {{ $ujian->mahasiswa->nim }}
                </td>
                <td
                    style="width: 60%; border: 0.5px solid black; padding: 8px; vertical-align: top; padding-bottom: 20px">
                    {{ $ujian->judul }}</td>
            </tr>
        </table>
    </main>
    <footer style="margin-top: 100px">
        <table style="width: 100%">
            <tr>
                <td style="width: 60%"></td>
                <td style="width: 40%">
                    <table>
                        <tr>
                            <td>Ditetapkan di</td>
                            <td style="vertical-align: top; padding: 0 8px 0 8px">:</td>
                            <td>Kendari</td>
                        </tr>
                        <tr>
                            <td>Pada tanggal</td>
                            <td style="vertical-align: top; padding: 0 8px 0 8px">:</td>
                            <td>25 Agustus 2023</td>
                        </tr>
                        <tr>
                            <td>DEKAN,</td>
                        </tr>
                    </table>
                    <br>
                    <br>
                    <br>
                    <br>
                    <table>
                        <tr>
                            <td>
                                <p style="font-style: bold">DR. IR. EDWARD NGII, ST., MT.</p>
                                <p>NIP. 197202121998021001</p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </footer>
    {{-- HALAMAN 2 --}}
</body>

</html>
