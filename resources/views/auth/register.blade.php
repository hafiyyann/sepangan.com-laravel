@extends('layouts.app')


@section('head')
  <title>Register</title>
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/login.css') }}">
@endsection

@section('content')
  <div class="container-fluid bg-warning d-flex align-items-center justify-content-center py-5" style="width: 100%; height: 100vh">
    <div class="row justify-content-center">
      <div class="col-md-9 col-10 col-sm-10" >
        <div class="row bg-white shadow align-items-center" style="border-radius: 1em;">
          <div class="header-box col-md-5 col-12 p-3">
            <img src="{{ URL::asset('images/login_asset.png') }}" alt="Login">
            <h5 class="font-weight-bold">Olahraga.com</h5>
            <p>Nikmati kemudahan dalam menyewa lapangan olahraga favorit anda, disini!</p>
            <a href="/register/mitra" class="btn btn-primary">Daftar menjadi mitra</a>
          </div>
          <div class="login-box col-md-7 col-12 d-flex align-items-center" style="padding: 2em;">
            <form class="col-md-12" method="POST" action="/register">
              @csrf
              <h1>DAFTAR</h1>
              <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="nama" name="name" placeholder="Masukkan nama lengkap anda..." value="{{ old('name') }}">
                <span class="text-danger"></span>
                @error('name')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Masukkan Email anda..." value="{{ old('email') }}">
                <span class="text-danger"></span>
                @error('email')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="nomorTelepon">Nomor telepon</label>
                <input type="text" class="form-control @error('nomorTelepon') is-invalid @enderror" id="nomorTelepon" name="nomorTelepon" placeholder="Masukkan nomor telepon anda..." value="{{ old('nomorTelepon') }}" >
                <span class="text-danger"></span>
                @error('nomorTelepon')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Masukkan password anda...">
                @error('password')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="password2">Konfirmasi Password</label>
                <input type="password" class="form-control @error('password2') is-invalid @enderror" id="password2" name="password2" placeholder="konfirmasi password anda...">
                @error('password2')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <div id="invalid-message" class="invalid-feedback"></div>
                <div id="valid-message" class="valid-feedback">Password Sama!</div>
              </div>
              <div class="password-confirmation-message"></div>
              <div class="row no-gutters">
                <div class="col-10 col-sm-10 col-md-9" style="padding: 0.5em 0;">
                  Sudah punya akun?
                  <a href="{{ url('/login') }}">Masuk Disini</a>
                </div>
                <div class="col-2 col-sm-2 col-md-3">
                  <button type="submit" id="submitBtn" class="btn btn-warning float-right text-white">DAFTAR</button>
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
  <script type="text/javascript">
    $('#submitBtn').attr("disabled",true);
    $('#password2').on('keyup', function() {
      if($('#password').val() == $('#password2').val()){
        $('#submitBtn').attr("disabled",false);
        $('#valid-message').show();
        $('#invalid-message').hide();
        $('#valid-message').css('color', 'green');
        $('#password2').css('border-color', 'green');
        $('#password2').removeClass('is-invalid');
        $('#password2').addClass('is-valid');
      } else {
        $('#submitBtn').attr("disabled",true);
        $('#valid-message').hide();
        $('#invalid-message').show();
        $('#invalid-message').html('Password tidak sama!').css('color', 'red');
        $('#password2').css('border-color', 'red');
        $('#password2').addClass('is-invalid');
      }
    });
  </script>
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
