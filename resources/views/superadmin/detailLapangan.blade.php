@extends('layouts.superadmin.app')

@section('header')
  <title>Detail Lapangan</title>
  <link href="{{ url('/css/adminLapangan/daftarLapangan.css') }}" rel="stylesheet" media="all">
@endsection

@section('content')
  <div class="main-content">
    <div class="row no-gutter title-page">
      <div class="col-sm-9">
        <h2>Detail Lapangan</h2>
      </div>
    </div>

    <div class="row no-gutters p-4 shadow-sm bg-white rounded">
      <div class="col-sm-12 my-3">
        <h5 class="mb-2">Gambar</h5>
        <img src="{{ asset('images/'.$data_lapangan->gambar) }}"  style="height: 200px;" alt="">
      </div>
      <div class="col-sm-12 my-3">
        <h5 class="mb-2">Nama Tempat</h5>
        <p class="bg-primary p-3 rounded shadow-sm text-white">{{ $data_tempat->namaTempat }}</p>
      </div>
      <div class="col-sm-12 my-3">
        <h5 class="mb-2">Nama</h5>
        <p class="bg-primary p-3 rounded shadow-sm text-white">{{ $data_lapangan->nama }}</p>
      </div>
      <div class="col-sm-12 my-3">
        <h5 class="mb-2">Jenis Olahraga</h5>
        <p class="bg-primary p-3 rounded shadow-sm text-white">{{ $data_lapangan->jenis_olahraga }}</p>
      </div>
      <div class="col-sm-12 my-3">
        <h5 class="mb-2">Jenis Lapangan</h5>
        <p class="bg-primary p-3 rounded shadow-sm text-white">{{ $data_lapangan->jenis_lapangan }}</p>
      </div>
      <div class="col-sm-12 my-3">
        <h5 class="mb-2">Harga Sewa</h5>
        <p class="bg-primary p-3 rounded shadow-sm text-white">Rp. {{ $data_lapangan->sewa }}</p>
      </div>
    </div>

    <div class="row no-gutters mt-3 justify-content-end">
      <a href="/admin/Lapangan" class="btn btn-secondary mr-auto">Kembali</a>
      <!-- <a href="/admin/Lapangan/{{$data_lapangan->id}}/ubah" class="btn btn-primary mr-1">Ubah</a>
      <a href="#" class="btn btn-danger delete-btn" lapangan-id="{{ $data_lapangan->id }}">Hapus</a> -->
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
