@extends('layouts.main')
@section('main-contents')
    <div class="content container-fluid mb-4">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Bukti Dukung</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route("s-v_$ujian->jenis_ujian-index") }}">Verifikasi
                                    Ujian</a></li>
                            <li class="breadcrumb-item active">Bukti Dukung</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="my-3">
            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path
                        d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                </symbol>
            </svg>
            <div class="alert alert-warning d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:">
                    <use xlink:href="#exclamation-triangle-fill" />
                </svg>
                <div class="ps-3" style="margin-bottom: -20px">
                    <h6 class="alert-heading">PEMBERITAHUAN !!! DAFTAR BUKTI DUKUNG YANG PERLU DIUPLOAD :
                    </h6>
                    <ul>
                        @if ($ujian->jenis_ujian == 'proposal')
                            <li>- Lembar Pengesahan</li>
                            <li>- Sertifikat TOEFL</li>
                            <li>- Lembar Kontrol Proposal</li>
                            <li>- SK Pembimbing</li>
                        @elseif ($ujian->jenis_ujian == 'hasil')
                            <li>- Lembar Pengesahan Hasil</li>
                            <li>- Lembar Kontrol Hasil</li>
                        @else
                            <li>- Lembar Pengesahan Skripsi</li>
                            <li>- Lembar Kontrol Skripsi</li>
                        @endif

                    </ul>
                </div>
            </div>
        </div>

        @if (count($file) > 0)
            <div class="d-flex justify-content-evenly flex-md-row flex-column">
                <div class="col-md-4 col-12 bg-white px-4 py-4">
                    <h5 class="mb-4">Nama File</h5>
                    <ul>
                        @foreach ($file as $item)
                            <li>
                                <a href="" class="file-link px-3 py-3 my-2"
                                    style="display: inline-block; width: 100%; border: 1px solid #3d5ee1"
                                    data-src="{{ asset('storage/' . $item->file) }}">{{ $item->nama_berkas }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-md-7 col-12 bg-white p-4">
                    <iframe id="file-iframe" src="{{ asset('storage/' . $file->first()->file) }}" align="top"
                        height="650" width="100%" frameborder="0" scrolling="auto"></iframe>
                </div>
            </div>
            <style>
                .selected {
                    background-color: #3d5ee1;
                    color: #fff
                }
            </style>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    const fileLinks = document.querySelectorAll('.file-link');
                    const fileIframe = document.getElementById('file-iframe');

                    fileLinks.forEach(link => {
                        link.addEventListener('click', function(event) {
                            event.preventDefault();
                            const fileSrc = this.getAttribute('data-src');
                            fileIframe.src = fileSrc;

                            fileLinks.forEach(link => {
                                link.classList.remove('selected');
                            });

                            this.classList.add('selected');

                            history.pushState({
                                fileSrc: fileSrc
                            }, null, this.href);
                        });
                    });

                    fileLinks[0].classList.add('selected');
                    fileIframe.src = fileLinks[0].getAttribute('data-src');
                });
            </script>
            <script>
                function confirmPengajuan(buktiId) {
                    Swal.fire({
                        title: 'Setujui Pengajuan Ujian',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Setujui!',
                        cancelButtonText: 'Batal!',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Jika pengguna menekan "Ya", kirim formulir
                            document.getElementById('confirmPengajuan' + buktiId).submit();
                        }
                    });
                }
            </script>
        @else
            <div class="d-flex align-items-center justify-content-center" style="height: 70vh">
                <div class="loader">
                    <div>
                        <ul>
                            <li>
                                <svg fill="currentColor" viewBox="0 0 90 120">
                                    <path
                                        d="M90,0 L90,120 L11,120 C4.92486775,120 0,115.075132 0,109 L0,11 C0,4.92486775 4.92486775,0 11,0 L90,0 Z M71.5,81 L18.5,81 C17.1192881,81 16,82.1192881 16,83.5 C16,84.8254834 17.0315359,85.9100387 18.3356243,85.9946823 L18.5,86 L71.5,86 C72.8807119,86 74,84.8807119 74,83.5 C74,82.1745166 72.9684641,81.0899613 71.6643757,81.0053177 L71.5,81 Z M71.5,57 L18.5,57 C17.1192881,57 16,58.1192881 16,59.5 C16,60.8254834 17.0315359,61.9100387 18.3356243,61.9946823 L18.5,62 L71.5,62 C72.8807119,62 74,60.8807119 74,59.5 C74,58.1192881 72.8807119,57 71.5,57 Z M71.5,33 L18.5,33 C17.1192881,33 16,34.1192881 16,35.5 C16,36.8254834 17.0315359,37.9100387 18.3356243,37.9946823 L18.5,38 L71.5,38 C72.8807119,38 74,36.8807119 74,35.5 C74,34.1192881 72.8807119,33 71.5,33 Z">
                                    </path>
                                </svg>
                            </li>
                            <li>
                                <svg fill="currentColor" viewBox="0 0 90 120">
                                    <path
                                        d="M90,0 L90,120 L11,120 C4.92486775,120 0,115.075132 0,109 L0,11 C0,4.92486775 4.92486775,0 11,0 L90,0 Z M71.5,81 L18.5,81 C17.1192881,81 16,82.1192881 16,83.5 C16,84.8254834 17.0315359,85.9100387 18.3356243,85.9946823 L18.5,86 L71.5,86 C72.8807119,86 74,84.8807119 74,83.5 C74,82.1745166 72.9684641,81.0899613 71.6643757,81.0053177 L71.5,81 Z M71.5,57 L18.5,57 C17.1192881,57 16,58.1192881 16,59.5 C16,60.8254834 17.0315359,61.9100387 18.3356243,61.9946823 L18.5,62 L71.5,62 C72.8807119,62 74,60.8807119 74,59.5 C74,58.1192881 72.8807119,57 71.5,57 Z M71.5,33 L18.5,33 C17.1192881,33 16,34.1192881 16,35.5 C16,36.8254834 17.0315359,37.9100387 18.3356243,37.9946823 L18.5,38 L71.5,38 C72.8807119,38 74,36.8807119 74,35.5 C74,34.1192881 72.8807119,33 71.5,33 Z">
                                    </path>
                                </svg>
                            </li>
                            <li>
                                <svg fill="currentColor" viewBox="0 0 90 120">
                                    <path
                                        d="M90,0 L90,120 L11,120 C4.92486775,120 0,115.075132 0,109 L0,11 C0,4.92486775 4.92486775,0 11,0 L90,0 Z M71.5,81 L18.5,81 C17.1192881,81 16,82.1192881 16,83.5 C16,84.8254834 17.0315359,85.9100387 18.3356243,85.9946823 L18.5,86 L71.5,86 C72.8807119,86 74,84.8807119 74,83.5 C74,82.1745166 72.9684641,81.0899613 71.6643757,81.0053177 L71.5,81 Z M71.5,57 L18.5,57 C17.1192881,57 16,58.1192881 16,59.5 C16,60.8254834 17.0315359,61.9100387 18.3356243,61.9946823 L18.5,62 L71.5,62 C72.8807119,62 74,60.8807119 74,59.5 C74,58.1192881 72.8807119,57 71.5,57 Z M71.5,33 L18.5,33 C17.1192881,33 16,34.1192881 16,35.5 C16,36.8254834 17.0315359,37.9100387 18.3356243,37.9946823 L18.5,38 L71.5,38 C72.8807119,38 74,36.8807119 74,35.5 C74,34.1192881 72.8807119,33 71.5,33 Z">
                                    </path>
                                </svg>
                            </li>
                            <li>
                                <svg fill="currentColor" viewBox="0 0 90 120">
                                    <path
                                        d="M90,0 L90,120 L11,120 C4.92486775,120 0,115.075132 0,109 L0,11 C0,4.92486775 4.92486775,0 11,0 L90,0 Z M71.5,81 L18.5,81 C17.1192881,81 16,82.1192881 16,83.5 C16,84.8254834 17.0315359,85.9100387 18.3356243,85.9946823 L18.5,86 L71.5,86 C72.8807119,86 74,84.8807119 74,83.5 C74,82.1745166 72.9684641,81.0899613 71.6643757,81.0053177 L71.5,81 Z M71.5,57 L18.5,57 C17.1192881,57 16,58.1192881 16,59.5 C16,60.8254834 17.0315359,61.9100387 18.3356243,61.9946823 L18.5,62 L71.5,62 C72.8807119,62 74,60.8807119 74,59.5 C74,58.1192881 72.8807119,57 71.5,57 Z M71.5,33 L18.5,33 C17.1192881,33 16,34.1192881 16,35.5 C16,36.8254834 17.0315359,37.9100387 18.3356243,37.9946823 L18.5,38 L71.5,38 C72.8807119,38 74,36.8807119 74,35.5 C74,34.1192881 72.8807119,33 71.5,33 Z">
                                    </path>
                                </svg>
                            </li>
                            <li>
                                <svg fill="currentColor" viewBox="0 0 90 120">
                                    <path
                                        d="M90,0 L90,120 L11,120 C4.92486775,120 0,115.075132 0,109 L0,11 C0,4.92486775 4.92486775,0 11,0 L90,0 Z M71.5,81 L18.5,81 C17.1192881,81 16,82.1192881 16,83.5 C16,84.8254834 17.0315359,85.9100387 18.3356243,85.9946823 L18.5,86 L71.5,86 C72.8807119,86 74,84.8807119 74,83.5 C74,82.1745166 72.9684641,81.0899613 71.6643757,81.0053177 L71.5,81 Z M71.5,57 L18.5,57 C17.1192881,57 16,58.1192881 16,59.5 C16,60.8254834 17.0315359,61.9100387 18.3356243,61.9946823 L18.5,62 L71.5,62 C72.8807119,62 74,60.8807119 74,59.5 C74,58.1192881 72.8807119,57 71.5,57 Z M71.5,33 L18.5,33 C17.1192881,33 16,34.1192881 16,35.5 C16,36.8254834 17.0315359,37.9100387 18.3356243,37.9946823 L18.5,38 L71.5,38 C72.8807119,38 74,36.8807119 74,35.5 C74,34.1192881 72.8807119,33 71.5,33 Z">
                                    </path>
                                </svg>
                            </li>
                            <li>
                                <svg fill="currentColor" viewBox="0 0 90 120">
                                    <path
                                        d="M90,0 L90,120 L11,120 C4.92486775,120 0,115.075132 0,109 L0,11 C0,4.92486775 4.92486775,0 11,0 L90,0 Z M71.5,81 L18.5,81 C17.1192881,81 16,82.1192881 16,83.5 C16,84.8254834 17.0315359,85.9100387 18.3356243,85.9946823 L18.5,86 L71.5,86 C72.8807119,86 74,84.8807119 74,83.5 C74,82.1745166 72.9684641,81.0899613 71.6643757,81.0053177 L71.5,81 Z M71.5,57 L18.5,57 C17.1192881,57 16,58.1192881 16,59.5 C16,60.8254834 17.0315359,61.9100387 18.3356243,61.9946823 L18.5,62 L71.5,62 C72.8807119,62 74,60.8807119 74,59.5 C74,58.1192881 72.8807119,57 71.5,57 Z M71.5,33 L18.5,33 C17.1192881,33 16,34.1192881 16,35.5 C16,36.8254834 17.0315359,37.9100387 18.3356243,37.9946823 L18.5,38 L71.5,38 C72.8807119,38 74,36.8807119 74,35.5 C74,34.1192881 72.8807119,33 71.5,33 Z">
                                    </path>
                                </svg>
                            </li>
                        </ul>
                    </div><span style="font-size: 20px">Tidak Ada File</span>
                </div>
            </div>
            <style>
                .loader {
                    --background: linear-gradient(135deg, #23C4F8, #275EFE);
                    --shadow: rgba(39, 94, 254, 0.28);
                    --text: #6C7486;
                    --page: rgba(255, 255, 255, 0.36);
                    --page-fold: rgba(255, 255, 255, 0.52);
                    --duration: 3s;
                    width: 330px;
                    height: 340px;
                    position: relative;
                }

                .loader:before,
                .loader:after {
                    --r: -6deg;
                    content: "";
                    position: absolute;
                    bottom: 8px;
                    width: 120px;
                    top: 80%;
                    box-shadow: 0 16px 12px var(--shadow);
                    transform: rotate(var(--r));
                }

                .loader:before {
                    left: 4px;
                }

                .loader:after {
                    --r: 6deg;
                    right: 4px;
                }

                .loader div {
                    width: 100%;
                    height: 100%;
                    border-radius: 13px;
                    position: relative;
                    z-index: 1;
                    perspective: 600px;
                    box-shadow: 0 4px 6px var(--shadow);
                    background-image: var(--background);
                }

                .loader div ul {
                    margin: 0;
                    padding: 0;
                    list-style: none;
                    position: relative;
                }

                .loader div ul li {
                    --r: 180deg;
                    --o: 0;
                    --c: var(--page);
                    position: absolute;
                    top: 10px;
                    left: 10px;
                    transform-origin: 100% 50%;
                    color: var(--c);
                    opacity: var(--o);
                    transform: rotateY(var(--r));
                    -webkit-animation: var(--duration) ease infinite;
                    animation: var(--duration) ease infinite;
                }

                .loader div ul li:nth-child(2) {
                    --c: var(--page-fold);
                    -webkit-animation-name: page-2;
                    animation-name: page-2;
                }

                .loader div ul li:nth-child(3) {
                    --c: var(--page-fold);
                    -webkit-animation-name: page-3;
                    animation-name: page-3;
                }

                .loader div ul li:nth-child(4) {
                    --c: var(--page-fold);
                    -webkit-animation-name: page-4;
                    animation-name: page-4;
                }

                .loader div ul li:nth-child(5) {
                    --c: var(--page-fold);
                    -webkit-animation-name: page-5;
                    animation-name: page-5;
                }

                .loader div ul li svg {
                    width: 155px;
                    height: 320px;
                    display: block;
                }

                .loader div ul li:first-child {
                    --r: 0deg;
                    --o: 1;
                }

                .loader div ul li:last-child {
                    --o: 1;
                }

                .loader span {
                    display: block;
                    left: 0;
                    right: 0;
                    top: 100%;
                    margin-top: 20px;
                    text-align: center;
                    color: var(--text);
                }

                @keyframes page-2 {
                    0% {
                        transform: rotateY(180deg);
                        opacity: 0;
                    }

                    20% {
                        opacity: 1;
                    }

                    35%,
                    100% {
                        opacity: 0;
                    }

                    50%,
                    100% {
                        transform: rotateY(0deg);
                    }
                }

                @keyframes page-3 {
                    15% {
                        transform: rotateY(180deg);
                        opacity: 0;
                    }

                    35% {
                        opacity: 1;
                    }

                    50%,
                    100% {
                        opacity: 0;
                    }

                    65%,
                    100% {
                        transform: rotateY(0deg);
                    }
                }

                @keyframes page-4 {
                    30% {
                        transform: rotateY(180deg);
                        opacity: 0;
                    }

                    50% {
                        opacity: 1;
                    }

                    65%,
                    100% {
                        opacity: 0;
                    }

                    80%,
                    100% {
                        transform: rotateY(0deg);
                    }
                }

                @keyframes page-5 {
                    45% {
                        transform: rotateY(180deg);
                        opacity: 0;
                    }

                    65% {
                        opacity: 1;
                    }

                    80%,
                    100% {
                        opacity: 0;
                    }

                    95%,
                    100% {
                        transform: rotateY(0deg);
                    }
                }
            </style>
        @endif


    </div>
@endsection
