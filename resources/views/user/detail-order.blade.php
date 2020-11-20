@extends('layouts.app')

@section('head')
  <title>Konfirmasi Pemesanan</title>
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
      <h1 class="pl-3">Order Detail</h1>
      <div class="col-md-12">
        <div class="row no-gutters">
          <div class="col-12">
            <div class="row no-gutters bg-warning rounded text-white shadow">
              <div class="col-sm-6 py-2 px-5">
                <span>Nomor Order</span>
              </div>
              <div class="col-sm-6 py-2 px-5">
                <span class="font-weight-bold">{{$order->id}}</span>
              </div>
            </div>
          </div>
        </div>
        <div class="row mt-3 no-gutters">
          <div class="col-12 bg-white shadow rounded p-5">
            <h5>Status Pemesanan</h5>
            <div class="row no-gutters text-center text-white">
              @if($order->status == 'dibuat')
                <div class="col-sm-3 col-12 p-3 bg-warning" style="border-radius: 10px 0 0 10px;">
                  <h5 class="mb-0">Pesanan Dibuat</h5>
                </div>
                <div class="col-sm-3 col-12 p-3 bg-secondary">
                  <h5 class="mb-0">Dibayar</h5>
                </div>
                <div class="col-sm-3 col-12 p-3 bg-secondary">
                  <h5 class="mb-0">Dikonfirmasi</h5>
                </div>
                <div class="col-sm-3 col-12 p-3 bg-secondary" style="border-radius: 0 10px 10px 0;">
                  <h5 class="mb-0">Selesai</h5>
                </div>
              @endif

              @if($order->status == 'dibayar')
                <div class="col-sm-3 col-12 p-3 bg-warning" style="border-radius: 10px 0 0 10px;">
                  <h5 class="mb-0">Pesanan Dibuat</h5>
                </div>
                <div class="col-sm-3 col-12 p-3 bg-warning">
                  <h5 class="mb-0">Dibayar</h5>
                </div>
                <div class="col-sm-3 col-12 p-3 bg-secondary">
                  <h5 class="mb-0">Dikonfirmasi</h5>
                </div>
                <div class="col-sm-3 col-12 p-3 bg-secondary" style="border-radius: 0 10px 10px 0;">
                  <h5 class="mb-0">Selesai</h5>
                </div>
              @endif

              @if($order->status == 'dikonfrimasi')
                <div class="col-sm-3 col-12 p-3 bg-warning" style="border-radius: 10px 0 0 10px;">
                  <h5 class="mb-0">Pesanan Dibuat</h5>
                </div>
                <div class="col-sm-3 col-12 p-3 bg-warning">
                  <h5 class="mb-0">Dibayar</h5>
                </div>
                <div class="col-sm-3 col-12 p-3 bg-warning">
                  <h5 class="mb-0">Dikonfirmasi</h5>
                </div>
                <div class="col-sm-3 col-12 p-3 bg-secondary" style="border-radius: 0 10px 10px 0;">
                  <h5 class="mb-0">Selesai</h5>
                </div>
              @endif

              @if($order->status == 'ditolak')
                <div class="col-sm-3 col-12 p-3 bg-warning" style="border-radius: 10px 0 0 10px;">
                  <h5 class="mb-0">Pesanan Dibuat</h5>
                </div>
                <div class="col-sm-3 col-12 p-3 bg-warning">
                  <h5 class="mb-0">Dibayar</h5>
                </div>
                <div class="col-sm-3 col-12 p-3 bg-danger">
                  <h5 class="mb-0">Ditolak</h5>
                </div>
                <div class="col-sm-3 col-12 p-3 bg-secondary" style="border-radius: 0 10px 10px 0;">
                  <h5 class="mb-0">Selesai</h5>
                </div>
              @endif

              @if($order->status == 'expired')
                <div class="col-sm-3 col-12 p-3 bg-warning" style="border-radius: 10px 0 0 10px;">
                  <h5 class="mb-0">Pesanan Dibuat</h5>
                </div>
                <div class="col-sm-3 col-12 p-3 bg-danger">
                  <h5 class="mb-0">Expired</h5>
                </div>
                <div class="col-sm-3 col-12 p-3 bg-secondary">
                  <h5 class="mb-0">Ditolak</h5>
                </div>
                <div class="col-sm-3 col-12 p-3 bg-secondary" style="border-radius: 0 10px 10px 0;">
                  <h5 class="mb-0">Selesai</h5>
                </div>
              @endif

              @if($order->status == 'selesai')
                <div class="col-sm-3 col-12 p-3 bg-warning" style="border-radius: 10px 0 0 10px;">
                  <h5 class="mb-0">Pesanan Dibuat</h5>
                </div>
                <div class="col-sm-3 col-12 p-3 bg-warning">
                  <h5 class="mb-0">Dibayar</h5>
                </div>
                <div class="col-sm-3 col-12 p-3 bg-warning">
                  <h5 class="mb-0">Dikonfirmasi</h5>
                </div>
                <div class="col-sm-3 col-12 p-3 bg-success" style="border-radius: 0 10px 10px 0;">
                  <h5 class="mb-0">Selesai</h5>
                </div>
              @endif

            </div>
          </div>
        </div>
        <div class="row mt-3 no-gutters">
          <div class="col-12 field-data bg-white shadow rounded p-5">
            <h5>Data Lapangan</h5>
            <form>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="nama_tempat">Nama Tempat</label>
                  <input type="text" id="nama_tempat" name="nama_tempat" class="form-control" value="{{$tempat->namaTempat}}" disabled>
                </div>
                <div class="form-group col-md-6">
                  <label for="alamat">Alamat</label>
                  <input type="text" id="alamat" name="alamat" class="form-control" value="{{$tempat->alamat}}" disabled>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="nama_lapangan">Nama Lapangan</label>
                  <input type="text" id="nama_lapangan" name="nama_lapangan" class="form-control" value="{{$field->nama}}" disabled>
                </div>
                <div class="form-group col-md-4">
                  <label for="jenis_olahraga">Jenis Olahraga</label>
                  <input type="text" id="jenis_olahraga" name="jenis_olahraga" class="form-control" value="{{$field->jenis_olahraga}}" disabled>
                </div>
                <div class="form-group col-md-4">
                  <label for="jenis_lapangan">Jenis Lapangan</label>
                  <input type="text" id="jenis_lapangan" name="jenis_lapangan" class="form-control" value="{{$field->jenis_lapangan}}" disabled>
                </div>
              </div>
            </form>
          </div>
        </div>

        <div class="row mt-3 no-gutters">
          <div class="col-12 field-data bg-white shadow rounded p-5">
            <h5>Data Pemesan</h5>
            <form class="" action="index.html" method="post">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="nama_tempat">Nama</label>
                  <input type="text" id="nama_tempat" name="nama_tempat" class="form-control" value="{{auth()->user()->name}}" disabled>
                </div>
                <div class="form-group col-md-6">
                  <label for="alamat">Nomor Telepon</label>
                  <input type="text" id="alamat" name="alamat" class="form-control" value="{{auth()->user()->nomorTelepon}}" disabled>
                </div>
              </div>
            </form>
          </div>
        </div>

        <div class="row my-3 no-gutters">
          <div class="col-12 field-data bg-white shadow rounded p-5">
            <h5>Waktu Pesanan</h5>
            <form class="" action="index.html" method="post">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="nama_tempat">Tanggal Pemesanan</label>
                  <input type="text" id="nama_tempat" name="nama_tempat" class="form-control" value="{{$order->tanggalPemesanan}}" disabled>
                </div>
                <div class="form-group col-md-3">
                  <label for="alamat">Mulai</label>
                  <input type="text" id="alamat" name="alamat" class="form-control" value="{{$order->start}}" disabled>
                </div>
                <div class="form-group col-md-3">
                  <label for="alamat">Selesai</label>
                  <input type="text" id="alamat" name="alamat" class="form-control" value="{{$order->end}}" disabled>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="row no-gutters">
          <div class="col-12 bg-white shadow rounded p-5">
            <h5>Pembayaran</h5>
            <div class="row no-gutters align-items-center">
              <div class="col-sm-6 col-6">
                <span>Status pembayaran</span>
              </div>
              <div class="col-sm-6 col-6">
                @if($payment->status == 'dibayar')
                  <span class="bg-success px-3 text-white py-2 rounded-pill d-inline-block">Dibayar</span>
                @endif

                @if($payment->status == 'belum dibayar')
                  <span class="bg-danger px-3 text-white py-2 rounded-pill d-inline-block">Belum Dibayar</span>
                @endif

                @if($payment->status == 'expired')
                  <span class="bg-danger px-3 text-white py-2 rounded-pill d-inline-block">Expired</span>
                @endif

              </div>
            </div>
            <div class="row no-gutters py-2">
              <form class="row col-sm-12 align-items-center" action="/riwayat/{{$order->id}}/detail/upload" method="post" enctype="multipart/form-data">
                @csrf
                @if($payment->bukti == null && $payment->status == 'expired')
                  <span>Mohon maaf. Pembayaran anda sudah kadaluarsa!</span>
                @endif
                @if($payment->bukti == null && $payment->status == 'belum dibayar')
                  <div class="col-sm-6">
                    Upload Bukti Pembayaran
                  </div>
                  <div class="custom-file col-sm-4">
                    <input type="file" class="custom-file-input" id="customFile" name="bukti">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                  </div>
                  <button type="submit" class="btn btn-primary">Upload</button>
                @endif
                @if($payment->bukti != null)
                  <div class="col-md-12">
                    <div class="row">
                      <span class="col-md-6">Bukti Pembayaran</span>
                      <span class="col-md-6">{{$payment->bukti}}</span>
                    </div>
                  </div>
                @endif
              </form>
            </div>
          </div>
        </div>
      </div>
      <a href="/riwayat" class="btn btn-warning ml-3 mt-3 text-white">Kembali</a>
    </div>
  </div>
@endsection

@section('footer')
  <script type="text/javascript">
      $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
      });
  </script>
@endsection
