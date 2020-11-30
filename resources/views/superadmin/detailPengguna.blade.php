@extends('layouts.superadmin.app')

@section('header')
  <title>Detail Pengguna</title>
  <link href="{{ url('/css/adminLapangan/daftarLapangan.css') }}" rel="stylesheet" media="all">
@endsection

@section('content')
  <div class="main-content">
    <div class="row no-gutter title-page">
      <div class="col-sm-9">
        <h2>Detail Pengguna</h2>
      </div>
    </div>

    <div class="row no-gutters p-4 shadow-sm bg-white rounded">
      <div class="col-sm-12 my-3">
        <h5 class="mb-2">Nama</h5>
        <p class="bg-primary p-3 rounded shadow-sm text-white">{{ $data_user->name }}</p>
      </div>
      <div class="col-sm-12 my-3">
        <h5 class="mb-2">Nomor Telepon</h5>
        <p class="bg-primary p-3 rounded shadow-sm text-white">{{ $data_user->nomorTelepon }}</p>
      </div>
      <div class="col-sm-12 my-3">
        <h5 class="mb-2">Tanggal Pendaftaran</h5>
        <p class="bg-primary p-3 rounded shadow-sm text-white">{{ $data_user->created_at }}</p>
      </div>
      <div class="col-sm-12 my-3">
        <h5 class="mb-2">Email</h5>
        <p class="bg-primary p-3 rounded shadow-sm text-white">{{ $data_user->email }}</p>
      </div>
      <div class="col-sm-12 my-3">
        <h5 class="mb-2">Status Akun</h5>
        @if($data_user->is_verified == 1)<p class="bg-primary p-3 rounded shadow-sm text-white">Terverifikasi</p>@endif
        @if($data_user->is_verified == 0)<p class="bg-primary p-3 rounded shadow-sm text-white">Belum Terverifikasi</p>@endif
      </div>
    </div>

    <div class="row no-gutters mt-3 justify-content-end">
      <a href="/admin/Pengguna" class="btn btn-secondary mr-auto">Kembali</a>
    </div>
  </div>
@endsection

@section('footer')
  <!-- <script>
    $('.delete-btn').click(function(){
      var lapangan_id = $(this).attr('lapangan-id');
      swal({
          title: "Apakah anda yakin?",
          text: "Langkah ini tidak bisa dibatalkan",
          icon: "warning",
          buttons: true,
          dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          window.location = "/mitra/lapangan/"+lapangan_id+"/hapus";
        }
      });
    });
  </script> -->
  <script>
    @if(Session::has('success'))
      toastr.options.progressBar = true;
      toastr.success("{{ Session::get('success') }}", "Sukses", {timeOut: 5000});
    @endif
  </script>
@endsection
