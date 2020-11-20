@extends('layouts.app')

@section('head')
  <title>Riwayat</title>
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

  <!-- main content -->
  <div class="container my-5">
    <div class="row">
      <h1 class="px-3">Riwayat Pemesanan</h1>
      <div class="col-md-12">
        <!-- daftar riwayat box -->
        @foreach($orders as $order)
          @foreach($fields as $field)
            @foreach($tempat as $data_tempat)
              @foreach($payments as $payment)
                @if($field->id == $order->id_lapangan && $data_tempat->id == $field->tempat_id && $order->payments_id == $payment->id)
                  <div class="row no-gutters mt-5">
                    <div class="col-md-12 bg-white shadow" style="border-radius: 0 0 10px 10px">
                      <div class="row no-gutters bg-warning px-5 py-3 text-white align-items-center" style="border-radius: 10px 10px 0 0">
                        <h5 class="col-sm-6 col-6 mb-0">No Order <b>{{$order->id}}</b></h5>
                        <div class="col-sm-6 col-6 text-right">
                          @if($order->status == 'dibuat')<span class="px-5 py-2 bg-success d-inline-block rounded-pill">Dibuat</span>@endif
                          @if($order->status == 'dibayar')<span class="px-5 py-2 bg-success d-inline-block rounded-pill">Dibayar</span>@endif
                          @if($order->status == 'dikonfrimasi')<span class="px-5 py-2 bg-success d-inline-block rounded-pill">Dikonfirmasi</span>@endif
                          @if($order->status == 'selesai')<span class="px-5 py-2 bg-success d-inline-block rounded-pill">Selesai</span>@endif
                          @if($order->status == 'expired')<span class="px-5 py-2 bg-danger d-inline-block rounded-pill">Expired</span>@endif
                          @if($order->status == 'ditolak')<span class="px-5 py-2 bg-danger d-inline-block rounded-pill">Ditolak</span>@endif
                        </div>
                      </div>
                      <div class="row px-5 py-3 align-items-center">
                        <div class="col-md-3 text-center">
                          <img src="{{ asset('images/'.$field->gambar) }}" class="img-fluid rounded">
                        </div>
                        <div class="col-md-9">
                          <div class="row">
                            <div class="col-sm-6">
                              <small>Tempat</small>
                              <h4>{{$data_tempat->namaTempat}}</h4>
                            </div>
                            <div class="col-sm-6">
                              <small>Lapangan</small>
                              <h4>{{$field->nama}}</h4>
                            </div>
                          </div>
                          <div class="px-3 py-2 col-12 col-sm-4 rounded-pill bg-primary d-inline-block text-white text-center mt-1">
                            <span><b>Tanggal Sewa</b> </span><span>{{ $order->tanggalPemesanan }}</span>
                          </div>
                          <div class="px-3 py-2 col-12 col-sm-4 rounded-pill bg-primary d-inline-block text-white text-center mt-1">
                            <span><b>Waktu Sewa</b> </span><span>{{\Carbon\Carbon::createFromFormat('H:i:s',$order->start)->format('H:i')}} - {{\Carbon\Carbon::createFromFormat('H:i:s',$order->end)->format('H:i')}}</span>
                          </div>
                          <div class="row py-2">
                            <small class="col-md-12">Total harga sewa</small>
                            <h4 class="col-md-12">Rp {{$payment->nominal}}</h4>
                          </div>
                          <div class="text-right">
                            <a href="riwayat/{{$order->id}}/detail" class="btn btn-warning text-white">Lihat Detail</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                @endif
              @endforeach
            @endforeach
          @endforeach
        @endforeach
      </div>
    </div>
  </div>
@endsection

@section('footer')

@endsection
