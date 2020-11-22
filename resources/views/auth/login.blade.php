@extends('layouts.app')


@section('head')
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/login.css') }}">
@endsection

@section('content')
  <div class="container-fluid bg-warning d-flex align-items-center justify-content-center py-5" style="width: 100%; height: 100vh">
    <div class="row justify-content-center">
      <div class="col-md-9 col-10 col-sm-10" >
        <div class="row bg-white shadow" style="border-radius: 1em;">
          <div class="header-box col-md-5 col-12 p-3">
            <img src="{{ URL::asset('images/login_asset.png') }}" alt="Login">
            <h5 class="font-weight-bold">Olahraga.com</h5>
            <p>Nikmati kemudahan dalam menyewa lapangan olahraga favorit anda, disini!</p>
          </div>
          <div class="login-box col-md-7 col-12 d-flex align-items-center" style="padding: 2em;">
            <form class="col-md-12" method="POST" action="/login">
              @csrf
              <h1>LOGIN</h1>
              <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Masukkan Email anda..." value="{{ old('email') }}">
                @error('email')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Masukkan password anda...">
                @error('password')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror<span class="text-danger"></span>
              </div>
              <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Ingat saya</label>
              </div>
              <div class="row no-gutters">
                <div class="col-10 col-sm-10 col-md-9" style="padding: 0.5em 0;">
                  Belum punya akun?
                  <a href="{{ url('/register') }}">Daftar Disini</a>
                </div>
                <div class="col-2 col-sm-2 col-md-3">
                  <button type="submit" class="btn btn-warning float-right text-white">MASUK</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('footer')
  <script>
    @if(Session::has('success'))
      toastr.options.progressBar = true;
      toastr.success("{{ Session::get('success') }}", "Sukses", {timeOut: 5000});
    @elseif(Session::has('fail'))
      toastr.options.progressBar = true;
      toastr.error("{{ Session::get('fail') }}", "Gagal", {timeOut: 5000});
    @endif
  </script>
@endsection
