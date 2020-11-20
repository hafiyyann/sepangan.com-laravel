@extends('layouts.app')


@section('head')
  <title>Result</title>
  <link rel="stylesheet" href="{{ url('/css/user/style.css')}}">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
@endsection

@section('content')
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
  <!-- main content -->
  <div class="container mt-3">
    <h1 class="page-title">Temukan Lapangan Anda</h1>
    <form class="sewa-section shadow" action="/pencarian" method="post">
      @csrf
      <div class="row">
        <div class="form-group col-md-8">
          <label for="input_tanggal">Tanggal</label>
          <input class="form-control" type="date" name="" value="{{$date}}">
        </div>
        <div class="form-group col-md-4">
          <label for="input_jam">Jam</label>
          <input class="form-control" type="time" name="" value="">
        </div>
      </div>
      <button type="submit" class="btn btn-primary col-md-12">Cari</button>
    </form>
  </div>
  <div class="container mb-5">
    @foreach($tempat as $data_tempat)
      @foreach($data_tempat->Lapangan as $lapangan)
        @if($available_field->contains($lapangan->id))
            <div class="row align-items-center bg-white shadow rounded no-gutters p-4 field-list">
            <div class="col-md-3">
              <img src="{{ asset('images/'.$lapangan->gambar) }}" alt="" width="250px;">
            </div>
            <div class="col-md-9 clearfix">
              <h1 class="place-title d-inline">{{ $data_tempat->namaTempat }}</h1>
              <h1 class="field-title d-inline float-right">{{ $lapangan->nama }}</h1>
              <h5 class="place-location"><i class="fa fa-location"></i> <b>Lokasi: </b>{{ $data_tempat->alamat }}</h5>
              <p class="m-0 price-label"><b>HARGA</b> per jam, mulai dari</p>
              <h1 class="place-price d-inline">{{ $lapangan->sewa }}</h1>
              <a href="/pencarian/{{$lapangan->id}}/detail" class="btn btn-warning float-right">Sewa Sekarang</a>
            </div>
          </div>
        @endif
      @endforeach
    @endforeach
  </div>
@endsection
