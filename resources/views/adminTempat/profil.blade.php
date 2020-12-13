@extends('layouts.adminTempat.app')

@section('header')
  <title>Profil</title>
  <link href="{{ url('/css/adminLapangan/daftarLapangan.css') }}" rel="stylesheet" media="all">
@endsection

@section('content')
  <div class="main-content">
    <!-- page  title-->
    <div class="row no-gutters title-page">
      <div class="col-sm-12 text-center">
        <h2>Profil Tempat</h2>
      </div>
    </div>

    <div class="row no-gutters mt-3">
      <div class="col-4">
        <div class="img text-center">
          <img src="\images\user.png" alt="" width="200px;" class="img-fluid rounded-circle shadow">
        </div>
        <div class="place-name text-center mt-3">
          <h5>{{$tempat->namaTempat}}</h5>
          <span>{{$tempat->alamat}}</span>
          <div class="d-block mt-3">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#change_password_modal">Ubah Password</button>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#change_place_status">Ubah Status</button>
          </div>
        </div>
      </div>
      <div class="col-8 bg-white shadow rounded p-3">
        <div class="col-sm-12 my-3">
          <h5 class="mb-2">Nama Pemilik</h5>
          <p class="bg-primary p-3 rounded shadow-sm text-white">{{$user->name}}</p>
        </div>
        <div class="col-sm-12 my-3">
          <h5 class="mb-2">Nomor Telepon</h5>
          <p class="bg-primary p-3 rounded shadow-sm text-white">{{$user->nomorTelepon}}</p>
        </div>
        <div class="col-sm-12 my-3">
          <h5 class="mb-2">Email</h5>
          <p class="bg-primary p-3 rounded shadow-sm text-white">{{$user->email}}</p>
        </div>
        <div class="col-sm-12 my-3">
          <h5 class="mb-2">Status</h5>
          @if($tempat->status == 0)<p class="bg-primary p-3 rounded shadow-sm text-white">Libur</p>@endif
          @if($tempat->status == 1)<p class="bg-primary p-3 rounded shadow-sm text-white">Buka</p>@endif
        </div>
      </div>
    </div>

    <div class="row no-gutters mt-3">
      <div class="col-12">
        <a href="/mitra/dashboard" class="btn btn-primary float-right">Kembali</a>
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
        <form action="/mitra/{{$user->id}}/ubah-password" method="post" id="change_password_form">
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

<div class="modal fade" id="change_place_status" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Ubah Status</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/mitra/{{$user->id}}/ubah-status" method="post" id="change_place_status">
        <div class="modal-body">
            @csrf
            <div class="form-group">
              <label for="status">Status Tempat</label>
              <select name="status" class="form-control @error('status') is-invalid @enderror" id="status">
                <option value="1" @if($tempat->status == 1) selected @endif>Buka</option>
                <option value="0" @if($tempat->status == 0) selected @endif>Libur</option>
              </select>
              @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" id="submitBtn2" class="btn btn-primary">Ubah</button>
        </div>
      </form>
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
