<div class="page-header">
   <div class="row">
      <div class="col-sm-12">
         <div class="page-sub-header">
            <h3 class="page-title">Draft</h3>
            <ul class="breadcrumb">
               <li class="breadcrumb-item"><a href="{{ route('s-v_proposal-index') }}">Verifikasi Ujian</a></li>
               <li class="breadcrumb-item active">Proposal</li>
               <li class="breadcrumb-item active">Draft</li>
               <li class="breadcrumb-item active">{{ $title }}</li>
            </ul>
         </div>
      </div>
   </div>
</div>

<div class="settings-menu-links">
   <ul class="nav nav-tabs menu-tabs d-flex">
      @if($ujian->jenis_ujian == 'skripsi')
      <li class="nav-item {{ request()->routeIs('s-sk_pembimbing') ? 'active' : '' }}">
         <a class="nav-link" href="{{ route('s-sk_pembimbing', $ujian->id) }}">SK Pembimbing</a>
      </li>
      <li class="nav-item {{ request()->routeIs('s-sk_penguji') ? 'active' : '' }}">
         <a class="nav-link" href="{{ route('s-sk_penguji', $ujian->id) }}">SK Penguji</a>
      </li>
      <li class="nav-item {{ request()->routeIs('s-berita_acara_skripsi') ? 'active' : '' }}">
         <a class="nav-link" href="{{ route('s-berita_acara_skripsi', $ujian->id) }}">Berita Acara Skripsi</a>
      </li>
      <li class="nav-item {{ request()->routeIs('s-undangan_proposal') ? 'active' : '' }}">
         <a class="nav-link" href="{{ route('s-undangan_proposal', $ujian->id) }}">Undangan Proposal</a>
      </li>
      <li class="nav-item {{ request()->routeIs('s-lembar_penilaian') ? 'active' : '' }} ">
         <a class="nav-link" href="{{ route('s-lembar_penilaian', $ujian->id) }}">Lembar Penilaian</a>
      </li>
      @endif
      
      @if($ujian->jenis_ujian == 'proposal')
      <li class="nav-item {{ request()->routeIs('s-berita_acara_proposal') ? 'active' : '' }}">
         <a class="nav-link" href="{{ route('s-berita_acara_proposal', $ujian->id) }}">Berita Acara</a>
      </li>
      <li class="nav-item {{ request()->routeIs('s-undangan_proposal') ? 'active' : '' }}">
         <a class="nav-link" href="{{ route('s-undangan_proposal', $ujian->id) }}">Undangan Proposal</a>
      </li>
      @endif

      @if($ujian->jenis_ujian == 'hasil')
      <li class="nav-item {{ request()->routeIs('s-berita_acara_hasil') ? 'active' : '' }}">
         <a class="nav-link" href="{{ route('s-berita_acara_hasil', $ujian->id) }}">Berita Acara</a>
      </li>
      <li class="nav-item {{ request()->routeIs('s-undangan_hasil') ? 'active' : '' }}">
         <a class="nav-link" href="{{ route('s-undangan_hasil', $ujian->id) }}">Undangan Proposal</a>
      </li>
      @endif
   </ul>
</div>