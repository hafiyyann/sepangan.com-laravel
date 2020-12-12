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
      <h1 class="pl-3">Konfirmasi Pemesanan</h1>
      <div class="col-md-8">
        <div class="row no-gutters">
          <div class="col-12 field-data bg-white shadow rounded p-5">
            <h5>Data Lapangan</h5>
            <form class="" action="index.html" method="post">
              <div class="form-group">
                <label for="nama_tempat">Nama Tempat</label>
                <input type="text" id="nama_tempat" name="nama_tempat" class="form-control" value="{{$data_tempat->namaTempat}}" disabled>
              </div>
              <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" id="alamat" name="alamat" class="form-control" value="{{$data_tempat->alamat}}" disabled>
              </div>
              <div class="form-group">
                <label for="nama_lapangan">Nama Lapangan</label>
                <input type="text" id="nama_lapangan" name="nama_lapangan" class="form-control" value="{{$data_lapangan->nama}}" disabled>
              </div>
              <div class="form-group">
                <label for="jenis_olahraga">Jenis Olahraga</label>
                <input type="text" id="jenis_olahraga" name="jenis_olahraga" class="form-control" value="{{$data_lapangan->jenis_olahraga}}" disabled>
              </div>
              <div class="form-group">
                <label for="jenis_lapangan">Jenis Lapangan</label>
                <input type="text" id="jenis_lapangan" name="jenis_lapangan" class="form-control" value="{{$data_lapangan->jenis_lapangan}}" disabled>
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
                  <input type="text" id="nama_tempat" name="nama_tempat" class="form-control" value="{{$data_user->name}}" disabled>
                </div>
                <div class="form-group col-md-6">
                  <label for="alamat">Nomor Telepon</label>
                  <input type="text" id="alamat" name="alamat" class="form-control" value="{{$data_user->nomorTelepon}}" disabled>
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
                  <label for="tanggal_pemesanan">Tanggal Pemesanan</label>
                  <input type="text" id="tanggal_pemesanan" name="date" class="form-control" value="{{$date}}" disabled>
                </div>
                <div class="form-group col-md-3">
                  <label for="alamat">Mulai</label>
                  <input type="text" id="alamat" name="alamat" class="form-control" value="{{$start_time}}" disabled>
                </div>
                <div class="form-group col-md-3">
                  <label for="alamat">Selesai</label>
                  <input type="text" id="alamat" name="alamat" class="form-control" value="{{$end_time}}" disabled>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <form class="" action="/pencarian/{{$data_lapangan->id}}/detail/pembayaran" method="post" id="order-form">
          @csrf
          <div class="row no-gutters mb-3">
            <div class="col-12 bg-white shadow rounded p-5">
              <h5>Keterangan Tambahan</h5>
              <div class="form-group">
                <textarea class="form-control" id="keterangan" name="catatan" rows="5" placeholder="berikan keterangan tambahan kepada pengelola lapangan..."></textarea>
              </div>
            </div>
          </div>
          <div class="row no-gutters">
            <div class="col-12 bg-white shadow rounded p-5">
              <h5>Konfirmasi Pembayaran</h5>
              <div class="form-group row mb-0">
                <label for="harga_perjam" class="col-form-label col-sm-8"><b>Harga Per Jam</b></label>
                <input type="text" readonly class="form-control-plaintext col-sm-4 text-right" name="sewa" id="harga_perjam" value="{{$data_lapangan->sewa}}">
              </div>
              <div class="form-group row mb-0">
                <label for="harga_perjam" class="col-form-label col-sm-8"><b>Total jam sewa</b></label>
                <input type="text" readonly class="form-control-plaintext col-sm-4 text-right" name="duration" id="harga_perjam" value="{{$duration}}">
              </div>
              <span class="border-bottom d-block"></span>
              <div class="form-group row mb-0">
                <label for="harga_perjam" class="col-form-label col-sm-8"><b>Total Pembayaran</b></label>
                <input type="text" readonly class="form-control-plaintext col-sm-4 text-right" name="nominal" id="harga_perjam" value="{{$nominal}}">
              </div>
              <button type="submit" class="btn btn-warning text-white col-sm-12" id="btn-submit">Lanjut ke pembayaran</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection

@section('footer')
  <script>
    $('#btn-submit').click(function(e){
      e.preventDefault();
      swal({
          title: "Apakah anda yakin?",
          text: "Anda akan melakukan pemesanan lapangan",
          icon: "warning",
          buttons: true,
          dangerMode: true,
      })
      .then((isConfirm) => {
        if (isConfirm) {
          $("#order-form").submit();
        }
      });
    });
    @if(Session::has('fail'))
      toastr.options.progressBar = true;
      toastr.error("{{ Session::get('fail') }}", "Gagal", {timeOut: 5000});
    @endif
  </script>
@endsection
