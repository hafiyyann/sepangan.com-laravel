@extends('layouts.app')


@section('head')
  <title>Register</title>
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/login.css') }}">
@endsection

@section('content')
  <div class="container-fluid bg-warning d-flex align-items-center justify-content-center" style="width: 100%; height: 100vh">
    <div class="row justify-content-center">
      <div class="col-md-9 col-10 col-sm-10" >
        <div class="row bg-white shadow align-items-center" style="border-radius: 1em;">
          <div class="header-box col-md-5 col-12 p-3">
            <img src="{{ URL::asset('images/login_asset.png') }}" alt="Login">
            <h5 class="font-weight-bold">Olahraga.com</h5>
            <p>Nikmati kemudahan dalam menyewa lapangan olahraga favorit anda, disini!</p>
            <a href="/register" class="btn btn-primary">Daftar menjadi pengguna</a>
          </div>
          <div class="login-box col-md-7 col-12 d-flex align-items-center" style="padding: 2em;">
            <form class="col-md-12" method="POST" action="/register/mitra">
              @csrf
              <h1>DAFTAR</h1>
              <div class="form-group">
                <label for="nama">Nama Pemilik</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="nama" name="name" placeholder="Masukkan nama lengkap anda...">
                <span class="text-danger"></span>
                @error('name')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="namaTempat">Nama Tempat</label>
                <input type="text" class="form-control @error('namaTempat') is-invalid @enderror" id="namaTempat" name="namaTempat" placeholder="Masukkan nama tempat anda...">
                <span class="text-danger"></span>
                @error('namaTempat')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Masukkan Email anda...">
                <span class="text-danger"></span>
                @error('email')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" placeholder="Masukkan alamat anda...">
                <span class="text-danger"></span>
                @error('alamat')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="nomorTelepon">Nomor telepon</label>
                <input type="text" class="form-control @error('nomorTelepon') is-invalid @enderror" id="nomorTelepon" name="nomorTelepon" placeholder="Masukkan nomor telepon anda...">
                <span class="text-danger"></span>
                @error('nomorTelepon')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Masukkan password anda...">
                <span class="text-danger"></span>
                @error('password')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="password2">Konfirmasi Password</label>
                <input type="password2" class="form-control" id="password2" name="password2" placeholder="konfirmasi password anda...">
                <span class="text-danger"></span>
              </div>
              <div class="row no-gutters">
                <div class="col-10 col-sm-10 col-md-9" style="padding: 0.5em 0;">
                  Sudah punya akun?
                  <a href="{{ url('/login') }}">Masuk Disini</a>
                </div>
                <div class="col-2 col-sm-2 col-md-3">
                  <button type="submit" class="btn btn-warning float-right text-white">DAFTAR</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
