@extends('layouts.app')

@section('head')
  <title>Detail</title>
  <link rel="stylesheet" href="{{ url('/css/user/user_theme.css')}}">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
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
  <div class="container my-5">
    <div class="row">
      <div class="col-md-8">
        <div class="bg-white p-2 shadow rounded border border-warning">
          <img src="{{ asset('images/'.$data_lapangan->gambar) }}" class="img-fluid" alt="">
        </div>
        <div class="bg-warning p-3 my-2 rounded-pill shadow">
          <div class="row no-gutters text-center">
            <div class="col-md-6">
              <span style="font-weight: 600">Jenis Lapangan : </span>
              <span>{{$data_lapangan->jenis_lapangan}}</span>
            </div>
            <div class="col-md-6">
              <span style="font-weight: 600">Jenis Lantai : </span>
              <span>Vinyl</span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="border border-warning bg-white p-4 shadow rounded">
          <div class="px-3 py-2 bg-warning text-white d-inline-block rounded-pill mb-1">
            <span>{{$data_lapangan->nama}}</span>
          </div>
          <div class="py-3 px-2 place-title">
            <h1>{{$data_tempat->namaTempat}}</h1>
            <span>Alamat : {{$data_tempat->alamat}}</span>
          </div>
          <div class="bottom-border mx-2"></div>
          <div class="pt-3 px-2 place-facility">
            <h5>Fasilitas</h5>
            <div class="facility-1 align-items-center row no-gutters">
              <span style="font-size: 48px" class="text-warning col-4 text-center"><i class="fas fa-toilet"></i></span>
              <span class="col-8">Toilet</span>
            </div>
            <div class="facility-1 align-items-center row no-gutters">
              <span style="font-size: 40px" class="text-warning col-4 text-center"><i class="fas fa-mosque"></i></span>
              <span class="col-8">Musholla</span>
            </div>
            <div class="facility-1 align-items-center row no-gutters">
              <span style="font-size: 40px" class="text-warning col-4 text-center"><i class="fas fa-store"></i></span>
              <span class="col-8">Kantin</span>
            </div>
            <div class="facility-1 align-items-center row no-gutters">
              <span style="font-size: 40px" class="text-warning col-4 text-center"><i class="fas fa-parking"></i></span>
              <span class="col-8">Area Parkir</span>
            </div>
          </div>
        </div>
        <div class="border border-warning bg-white p-4 shadow rounded my-2">
          <span>Sewa</span>
          <h1>Rp. {{$data_lapangan->sewa}}</h1>
          <a href="/pencarian/{{$data_lapangan->id}}/detail/konfirmasi-pemesanan" class="btn btn-warning text-white">Pesan Sekarang</a>
        </div>
      </div>

    </div>
  </div>
@endsection

@section('footer')

@endsection
