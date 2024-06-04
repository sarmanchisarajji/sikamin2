@extends('layouts.main')
@section('main-contents')
    <div class="container-fluid content d-flex gap-3">
        <div class="col-4">
            <div class="card flex-fill fb sm-box">
                <div class="social-likes">
                    <p>Total Membimbing</p>
                    <h6>{{ $jumlahMahasiswaBimbingan }}</h6>
                </div>
                <div class="social-boxs">
                    {{-- <img src="assets/img/icons/social-icon-01.svg" alt="Social Icon"> --}}
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card flex-fill fb sm-box">
                <div class="social-likes">
                    <p>Total Menguji</p>
                    <h6>{{ $jumlahMahasiswaDiuji }}</h6>
                </div>
                <div class="social-boxs">
                    {{-- <img src="assets/img/icons/social-icon-01.svg" alt="Social Icon"> --}}
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card flex-fill fb sm-box">
                <div class="social-likes">
                    <p>Total Selesai Ujian</p>
                    <h6>{{ $totalSelesaiUjian }}</h6>
                </div>
                <div class="social-boxs">
                    {{-- <img src="assets/img/icons/social-icon-01.svg" alt="Social Icon"> --}}
                </div>
            </div>
        </div>

    </div>
    <div class="content container-fluid d-flex flex-column flex-sm-row justify-content-between vh-100 gap-3">
        <div class="col-sm-5">
            <div class="p-3 card col-12">
                <div id="calendar-doctor" class="calendar-container"></div>
            </div>
        </div>
        <div class="col-sm-7" style="overflow-y: auto; height: 650px;">
            @foreach ($ujian as $item)
                <div class="bg-white p-3 d-flex gap-3 align-items-center mb-3">
                    <div class="col-2 text-center">
                        <p class="m-0">{{ date('h:i A', strtotime($item->jam_ujian)) }}</p>
                    </div>
                    <div class="px-4 col-10" style="border-inline-start: 5px  solid #3d5ee1;">
                        <div class="">
                            <div>
                                <h6>{{ $item->judul }}</h6>
                                <h7>{{ $item->mahasiswa->nama }}</h7>
                            </div>
                            <div>
                                @if ($item->jenis_ujian == 'proposal')
                                    <span class="badge badge-danger">{{ $item->jenis_ujian }}</span>
                                @elseif($item->jenis_ujian == 'hasil')
                                    <span class="badge badge-warning">{{ $item->jenis_ujian }}</span>
                                @else
                                    <span class="badge badge-info">{{ $item->jenis_ujian }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <script>
        var ujianData = @json($ujian);
    </script>
    <!-- Muat file JavaScript yang baru dibuat -->
    <script src="{{ asset('js/calendar.js') }}"></script>
@endsection
