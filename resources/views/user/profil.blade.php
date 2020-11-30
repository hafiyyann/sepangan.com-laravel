@extends('layouts.app')

@section('header')
  <title>Profil</title>
  <link rel="stylesheet" href="{{ url('/css/user/style.css')}}">
  <link href="{{ url('/css/adminLapangan/daftarLapangan.css') }}" rel="stylesheet" media="all">
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

  <div class="container mt-5">
    <!-- page  title-->
    <div class="row no-gutters title-page">
      <div class="col-sm-12 text-center">
        <h2>Profil Pengguna</h2>
      </div>
    </div>

    <div class="row no-gutters mt-3">
      <div class="col-4">
        <div class="img text-center">
          <img src="\images\user.png" alt="" width="200px;" class="img-fluid rounded-circle shadow">
        </div>
        <div class="place-name text-center mt-3">
          <h5>{{$user->name}}</h5>
          <div class="d-block mt-3">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#change_password_modal">Ubah Password</button>
          </div>
        </div>
      </div>
      <div class="col-8">
        <div class="row no-gutters bg-white shadow rounded p-5">
          <div class="col-sm-12">
            <h5 class="mb-2">Nomor Telepon</h5>
            <p class="bg-primary p-3 rounded shadow-sm text-white">{{ $user->nomorTelepon }}</p>
          </div>
          <div class="col-sm-12">
            <h5 class="mb-2">Email</h5>
            <p class="bg-primary p-3 rounded shadow-sm text-white">{{ $user->email }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="change_password_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Ubah Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/{{$user->id}}/ubah-password" method="post" id="change_password_form">
          @csrf
          <div class="form-group">
            <label for="old_password" class="col-form-label">Password Lama</label>
            <input type="password" name="old_password" id="old_password" class="form-control" placeholder="Masukkan password lama...">
          </div>
          <div class="form-group">
            <label for="password">Password Baru</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Masukkan password baru...">
            @error('password')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for="password2">Konfirmasi Password Baru</label>
            <input type="password" class="form-control @error('password2') is-invalid @enderror" id="password2" name="password2" placeholder="konfirmasi password baru...">
            @error('password2')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <div id="invalid-message" class="invalid-feedback"></div>
            <div id="valid-message" class="valid-feedback">Password Sama!</div>
          </div>
          <div class="password-confirmation-message"></div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="button" id="submitBtn" class="btn btn-primary">Ubah</button>
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
    $(document).ready(function() {
       $("#submitBtn").click(function() {
           $("#change_password_form").submit();
       });
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
