@extends('layouts.adminTempat.app')

@section('header')
  <title>Daftar Lapangan</title>
  <link href="{{ url('/css/adminLapangan/daftarLapangan.css') }}" rel="stylesheet" media="all">
@endsection

@section('content')
  <div class="main-content">
    <div class="row no-gutter title-page">
      <div class="col-sm-9">
        <h2>Detail Order</h2>
      </div>
    </div>

    <div class="row no-gutters p-5 shadow-sm bg-white rounded">
      <h4 class="col-sm-12">Data Pemesan</h5>
      <div class="col-sm-6 pr-3 mt-3">
        <h5 class="mb-2">Nama1</h5>
        <p class="bg-primary p-3 rounded shadow-sm text-white">{{ $order->namaPemesan }}</p>
      </div>
      <div class="col-sm-6 pr-3 mt-3">
        <h5 class="mb-2">Nomor Telepon</h5>
        <p class="bg-primary p-3 rounded shadow-sm text-white">{{ $order->nomorTelepon }}</p>
      </div>
    </div>

    <div class="row no-gutters p-5 shadow-sm bg-white rounded mt-3">
      <h4 class="col-sm-12">Data Order</h5>
      <div class="col-sm-6 pr-3 mt-3">
        <h5 class="mb-2">Nama Lapangan</h5>
        <p class="bg-primary p-3 rounded shadow-sm text-white">{{ $data_lapangan->nama }}</p>
      </div>
      <div class="col-sm-6 pr-3 mt-3">
        <h5 class="mb-2">Jenis Olahraga</h5>
        <p class="bg-primary p-3 rounded shadow-sm text-white">{{ $data_lapangan->jenis_olahraga }}</p>
      </div>
    </div>

    <div class="row no-gutters p-5 shadow-sm bg-white rounded mt-3">
      <h4 class="col-sm-12">Data Order</h5>
      <div class="col-sm-6 pr-3 mt-3">
        <h5 class="mb-2">Tanggal Pemesanan</h5>
        <p class="bg-primary p-3 rounded shadow-sm text-white">{{ $order->tanggalPemesanan }}</p>
      </div>
      <div class="col-sm-6 pr-3 mt-3">
        <h5 class="mb-2">Jam Mulai</h5>
        <p class="bg-primary p-3 rounded shadow-sm text-white">{{ $order->start }}</p>
      </div>
      <div class="col-sm-6 pr-3 mt-3">
        <h5 class="mb-2">Jam Selesai</h5>
        <p class="bg-primary p-3 rounded shadow-sm text-white">{{ $order->end }}</p>
      </div>
      <div class="col-sm-6 pr-3 mt-3">
        <h5 class="mb-2">Total Pembayaran</h5>
        <p class="bg-primary p-3 rounded shadow-sm text-white">{{ $order->totalSewa }}</p>
      </div>
    </div>

    <div class="row no-gutters px-5 py-3 shadow-sm bg-white rounded mt-3">
      <span class="col-sm-6"><b>Status Pemesanan</b></span>
      <span class="col-sm-6">{{$order->status}}</span>
    </div>
    @if(\Carbon\Carbon::now()->format('Y-m-d') == $order->tanggalPemesanan && \Carbon\Carbon::now()->setTimezone('Asia/Jakarta')->format('H:i:s') >= $order->end && $order->status != 'selesai')
      <a href="/mitra/Orders/Offline/{{$order->id}}/Selesai" class="btn btn-success ml-auto mt-3 mr-3">Selesai</a>
    @endif
    <a href="/mitra/Orders/Offline" class="btn btn-secondary mt-3">Batal</a>

@endsection

@section('footer')
  <!-- <script>
    @if(Session::has('success'))
      toastr.options.progressBar = true;
      toastr.success("{{ Session::get('success') }}", "Sukses", {timeOut: 5000});
    @endif
  </script> -->
@endsection
