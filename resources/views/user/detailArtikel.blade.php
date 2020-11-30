@extends('layouts.app')

@section('head')
  <title>Home</title>
  <link rel="stylesheet" href="{{ url('/css/user/style.css')}}">
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
            <a class="nav-link text-white" href="{{ url('/') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="{{ url('/artikel') }}">Artikel</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="#">Tentang Kami</a>
          </li>
          @if (Auth::check())
            <li class="nav-item dropdown">
             <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               {{ Illuminate\Support\Str::words(auth()->user()->name, 1) }}
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
  <!-- Content -->
  <div class="container">
    <div class="row my-5 justify-content-center">
      <h1 class="col-8">{{$Article->title}}</h1>
      <h5 class="col-8">{{$Article->author}}</h5>
      <div class="col-8 my-3 rounded shadow p-2">
        <img src="\images\TENNIS.jpeg" class="img-fluid">
      </div>
      <div class="col-8">
        {!! $Article->content !!}
      </div>
    </div>
  </div>
@endsection

@section('footer')

@endsection
