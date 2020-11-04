@extends('layouts.app')


@section('head')
  <title>Result</title>
  <link rel="stylesheet" href="{{ url('/css/user/style.css')}}">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
@endsection

@section('content')
  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="{{ url('/images/login_asset.png') }}" height="30" alt="">
        SEPANGAN.CO.ID
      </a>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto navbar-right">
          <li class="nav-item">
            <a class="nav-link" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Artikel</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Tentang Kami</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Masuk</a>
          </li>
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
          <input class="form-control" type="date" name="" value="">
        </div>
        <div class="form-group col-md-4">
          <label for="input_jam">Jam</label>
          <input class="form-control" type="time" name="" value="">
        </div>
      </div>
      <button type="submit" class="btn btn-primary col-md-12">Cari</button>
    </form>
  </div>
  <div class="container">
    <div class="row align-items-center bg-white shadow rounded no-gutters p-4 field-list">
      <div class="col-md-3">
        <img src="{{ asset('images/TENNIS.jpeg')}}" alt="" height="150px;">
      </div>
      <div class="col-md-9">
        <h1 class="place-title">Rush badminton</h1>
        <h5 class="place-location"><i class="fa fa-location"></i> <b>Lokasi:</b> Kaliwates, Jember</h5>
        <p class="m-0 price-label"><b>HARGA</b> per jam, mulai dari</p>
        <h1 class="place-price d-inline">50.000</h1>
        <button type="button" class="btn btn-primary float-right">Sewa Sekarang</button>
      </div>
    </div>


  </div>
@endsection
