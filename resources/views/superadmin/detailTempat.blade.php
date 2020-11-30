@extends('layouts.superadmin.app')

@section('header')
  <title>Detail Tempat</title>
  <link href="{{ url('/css/adminLapangan/daftarLapangan.css') }}" rel="stylesheet" media="all">
@endsection

@section('content')
  <div class="main-content">
    <div class="row no-gutter title-page">
      <div class="col-sm-9">
        <h2>Detail Tempat</h2>
      </div>
    </div>

    <div class="row no-gutters p-4 shadow-sm bg-white rounded">
      <div class="col-sm-12 my-3">
        <h5 class="mb-2">Nama Tempat</h5>
        <p class="bg-primary p-3 rounded shadow-sm text-white">{{ $data_tempat->namaTempat }}</p>
      </div>
      <div class="col-sm-12 my-3">
        <h5 class="mb-2">Nama Pemilik</h5>
        <p class="bg-primary p-3 rounded shadow-sm text-white">{{ $data_user->name }}</p>
      </div>
      <div class="col-sm-12 my-3">
        <h5 class="mb-2">Tanggal Pendaftaran</h5>
        <p class="bg-primary p-3 rounded shadow-sm text-white">{{ $data_user->created_at }}</p>
      </div>
      <div class="col-sm-12 my-3">
        <h5 class="mb-2">Nomor Telepon</h5>
        <p class="bg-primary p-3 rounded shadow-sm text-white">{{ $data_user->nomorTelepon }}</p>
      </div>
      <div class="col-sm-12 my-3">
        <h5 class="mb-2">Alamat</h5>
        <p class="bg-primary p-3 rounded shadow-sm text-white">{{ $data_tempat->alamat }}</p>
      </div>
    </div>

    <div class="row no-gutters mt-3 justify-content-end">
      <a href="/admin/Tempat" class="btn btn-secondary mr-auto">Kembali</a>
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
