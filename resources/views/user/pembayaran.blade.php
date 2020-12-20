@extends('layouts.app')

@section('head')
  <title>Pembayaran</title>
  <link rel="stylesheet" href="{{ url('/css/user/user_theme.css')}}">
@endsection

@section('content')
  <!-- navigation -->
  <nav class="navbar navbar-expand-lg bg-warning">
    <div class="container">
      <a class="navbar-brand text-white" href="#">
        <img src="{{ url('/images/login_asset.png') }}" height="30" alt="">
        <span style="font-weight: 700">SEPANGAN.CO.ID</span>
      </a>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto navbar-right">
          <li class="nav-item">
            <a class="nav-link text-white" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="#">Artikel</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="#">Tentang Kami</a>
          </li>
          @if (Auth::check())
            <li class="nav-item dropdown">
             <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               Hi, Muhammad
             </a>
             <div class="dropdown-menu" aria-labelledby="navbarDropdown">
               <a class="dropdown-item" href="/profil">Akun Saya</a>
               <a class="dropdown-item" href="/riwayat">Riwayat</a>
               <div class="dropdown-divider"></div>
               <a class="dropdown-item" href="/logout">Logout</a>
             </div>
            </li>
          @else
            <li class="nav-item">
              <a class="nav-link text-white" href="/login">Masuk</a>
            </li>
          @endif
        </ul>
      </div>
    </div>
  </nav>

  <!-- content -->
  <div class="container my-5">
    <div class="row">
      <div class="col-sm-12 bg-warning rounded shadow-sm text-white px-5 py-3 mb-3">
        <h5 style="font-weight: normal">Nomor Order</h5>
        <h3>{{'#'.str_pad($data_order->id + 1, 8, "0", STR_PAD_LEFT)}}</h1>
      </div>
      <div class="col-sm-12 bg-white rounded shadow-sm">
        <div class="content p-5 text-center">
          <h6>Silahkan melakukan pembayaran sesuai dengan nominal yang tertera di bawah</h6>
          <h1 style="font-size: 75px;"><b>Rp. {{$data_pembayaran->nominal}}</b></h1>
          <h7>Silahkan melakukan pembayaran sebelum pukul <b>{{ Carbon\Carbon::parse($data_pembayaran->payment_due)->format('H:i') }}</b></h7>
          <h5 class="mt-3">Bank Tujuan Pembayaran</h5>
          <div class="row no-gutters justify-content-center align-items-center py-2">
            <img src="{{ asset('images/Bni_logo.png') }}" class="img-fluid mr-3" alt="logo BNI" style="height: 40px; width: auto;">
            <h5 class="mb-0">1002966 099</h5>
            <div class="col-12">
              a.n. PT Sewa Mobil Sejahtera Bersama
            </div>
            <div class="col-5 border-bottom mt-2"></div>
          </div>
          <div class="row no-gutters justify-content-center align-items-center pb-2">
            <img src="{{ asset('images/Mandiri_logo.png') }}" class="img-fluid mr-3" alt="logo BNI" style="height: 40px; width: auto;">
            <h5 class="mb-0">81788900 91029</h5>
            <div class="col-12">
              a.n. PT Sewa Mobil Sejahtera Bersama
            </div>
            <div class="col-5 border-bottom mt-2"></div>
          </div>
          <div class="row no-gutters justify-content-center align-items-center pb-2">
            <img src="{{ asset('images/bca_logo.png') }}" class="img-fluid mr-3" alt="logo BNI" style="height: 40px; width: auto;">
            <h5 class="mb-0">7716277 019101</h5>
            <div class="col-12">
              a.n. PT Sewa Mobil Sejahtera Bersama
            </div>
            <div class="col-5 border-bottom mt-2"></div>
          </div>
          <p class="mb-2 font-italic">Mohon lakukan pembayaran sesuai nominal yang tersedia dan sebelum batas transaksi berakhir. Apabila konfirmasi pembayaran belum diterima sebelum batas akhir pembayaran maka pesanan akan otomatis terbatalkan.</p>
          <div class="row justify-content-center no-gutters">
            <div class="col-5 border-bottom mt-2"></div>
          </div>
          <div class="row justify-content-center no-gutters mt-2">
            <a class="btn btn-warning text-white" href="{{ url('/riwayat')}}">Lihat riwayat</a>
          </div>
        </div>
      </div>
    </div>

  </div>
@endsection

@section('footer')

@endsection
