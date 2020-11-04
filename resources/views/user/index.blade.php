@extends('layouts.app')


@section('head')
  <title>Home</title>
  <link rel="stylesheet" href="{{ url('/css/user/style.css')}}">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
@endsection


@section('content')
  <!-- navigation -->
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

  <!-- Main Content -->
  <div class="bg-1">
    <div class="container">
      <div class="row align-items-center home-content">
        <div class="col-md-5">
          <img src="{{ url('/images/login_asset.png') }}"  height="200px" alt="">
          <h1>SELAMAT DATANG!</h1>
          <h2>Menyewa lapangan lebih mudah dengan <b>Sepangan.co.id</b></h2>
        </div>
        <div class="col-md-7 sewa-warp">
            <h1>Sewa Sekarang!</h1>
            <form class="sewa-section shadow" action="/pencarian" method="post">
              @csrf
              <div class="row">
                <div class="form-group col-md-12">
                  <label for="jenis_lapangan">Jenis Lapangan</label>
                  <select name="jenis_lapangan" class="form-control @error('jenis_lapangan') is-invalid @enderror" id="jenis_lapangan">
                    <option hidden selected value>Jenis Lapangan</option>
                    <option>Badminton</option>
                    <option>Futsal</option>
                    <option>Sepakbola</option>
                    <option>Tennis</option>
                    <option>Mini-sepakbola</option>
                    <option>Volley</option>
                    <option>Tennis Meja</option>
                  </select>
                </div>
                <div class="form-group col-md-12">
                  <label for="input_tanggal">Tanggal</label>
                  <input class="form-control" type="date" name="tanggal">
                </div>
                <div class="form-group col-md-12">
                  <label for="start">Jam Mulai</label>
                  <select name="start" class="form-control @error('start') is-invalid @enderror" id="start">
                    <option hidden selected value>Jam Mulai</option>
                    <option>09:00</option>
                    <option>10:00</option>
                    <option>11:00</option>
                    <option>12:00</option>
                    <option>13:00</option>
                    <option>14:00</option>
                    <option>15:00</option>
                    <option>16:00</option>
                    <option>17:00</option>
                    <option>18:00</option>
                    <option>19:00</option>
                    <option>20:00</option>
                    <option>21:00</option>
                    <option>22:00</option>
                    <option>23:00</option>
                  </select>
                </div>
                <div class="form-group col-md-12">
                  <label for="end">Jam Selesai</label>
                  <select name="end" class="form-control @error('start') is-invalid @enderror" id="end">
                    <option hidden selected value>Jam Mulai</option>
                    <option>09:00</option>
                    <option>10:00</option>
                    <option>11:00</option>
                    <option>12:00</option>
                    <option>13:00</option>
                    <option>14:00</option>
                    <option>15:00</option>
                    <option>16:00</option>
                    <option>17:00</option>
                    <option>18:00</option>
                    <option>19:00</option>
                    <option>20:00</option>
                    <option>21:00</option>
                    <option>22:00</option>
                    <option>23:00</option>
                  </select>
                </div>
              </div>
              <button type="submit" class="btn btn-primary col-md-12">Cari</button>
            </form>
        </div>
      </div>
    </div>
  </div>
  <div class="bg-2">
    <div class="container">
      <div class="row align-items-center section-2">
        <h1 class="col-md-12">Keuntungan</h1>
        <div class="col-sm-4">
          <h2>Lorem</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
        <div class="col-sm-4">
          <h2>Lorem</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
        <div class="col-sm-4">
          <h2>Lorem</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
      </div>
    </div>
  </div>
  <div class="bg-3">
    <div class="container">
      <div class="row align-items-center section-3 text-center">
        <h1 class="col-md-12">Kategori Lapangan</h1>
        <div class="col-md-3">
          <span style="font-size: 7em; color: white;">
            <i class="fas fa-futbol"></i>
          </span><br>
          <h5>Sepakbola</h5>
        </div>
        <div class="col-md-3 text-center">
          <span style="font-size: 7em; color: white;">
            <i class="fas fa-shuttlecock"></i>
          </span><br>
          <h5>Badminton</h5>
        </div>
        <div class="col-md-3 text-center">
          <span style="font-size: 7em; color: white;">
            <i class="fas fa-basketball-ball"></i>
          </span><br>
          <h5>Basketball</h5>
        </div>
        <div class="col-md-3 text-center">
          <span style="font-size: 7em; color: white;">
            <i class="far fa-futbol"></i>
          </span><br>
          <h5>Mini-Sepakbola</h5>
        </div>
        <div class="col-md-3 text-center">
          <span style="font-size: 7em; color: white;">
            <i class="fas fa-tennis-ball"></i>
          </span><br>
          <h5>Tennis</h5>
        </div>
        <div class="col-md-3 text-center">
          <span style="font-size: 7em; color: white;">
            <i class="fas fa-futbol"></i>
          </span><br>
          <h5>Futsal</h5>
        </div>
        <div class="col-md-3 text-center">
          <span style="font-size: 7em; color: white;">
            <i class="fas fa-table-tennis"></i>
          </span><br>
          <h5>Tennis Meja</h5>
        </div>
        <div class="col-md-3 text-center">
          <span style="font-size: 7em; color: white;">
            <i class="fas fa-volleyball-ball"></i>
          </span><br>
          <h5>Volley</h5>
        </div>
      </div>
    </div>
  </div>
  <div class="bg-2">
    <div class="container">
      <div class="row align-items-center section-4 text-center">
          <h1 class="col-md-12">Langkah Pemesanan</h1>
          <div class="col-md-3">
            <h1>1</h1>
            <p>Pilih Tanggal dan waktu pemesanan yang anda inginkan</p>
          </div>
          <div class="col-md-3">
            <h1>2</h1>
            <p>Pilih Lapangan yang tersedia</p>
          </div>
          <div class="col-md-3">
            <h1>3</h1>
            <p>Lakukan pembayaran</p>
          </div>
          <div class="col-md-3">
            <h1>4</h1>
            <p>Setelah pengelola lapangan mengkofirmasi pesanan. Lapangan siap digunakan</p>
          </div>
      </div>
    </div>
  </div>
  <div class="footer">
    Sepangan.co.id 2020
  </div>
@endsection