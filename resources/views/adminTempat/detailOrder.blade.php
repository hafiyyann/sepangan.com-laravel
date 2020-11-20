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
        <h5 class="mb-2">Nama</h5>
        <p class="bg-primary p-3 rounded shadow-sm text-white">{{ $data_pemesan->name }}</p>
      </div>
      <div class="col-sm-6 pr-3 mt-3">
        <h5 class="mb-2">Nomor Telepon</h5>
        <p class="bg-primary p-3 rounded shadow-sm text-white">{{ $data_pemesan->nomorTelepon }}</p>
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
        <p class="bg-primary p-3 rounded shadow-sm text-white">{{ $data_pembayaran->nominal }}</p>
      </div>
    </div>

    <div class="row no-gutters p-5 shadow-sm bg-white rounded mt-3">
      <h4 class="col-sm-12">Ubah Status Pemesanan</h5>
      <form class="col-sm-8 mt-3" id="order_status_change_form" action="/mitra/Orders/{{$order->id}}/Ubah-Status" method="post">
        @csrf
        <div class="form-group row mb-0">
          <span class="col-sm-6">Status Pemesanan</span>
          @if($order->status == 'dibayar')
            <select name="order_status" class="form-control @error('start') is-invalid @enderror" id="start">
              <option hidden selected value>Pilih Status</option>
              <option>Diterima</option>
              <option>Ditolak</option>
            </select>
          @endif
          @if($order->status == 'dikonfrimasi')<span class="col-sm-6">Dikonfirmasi</span>@endif
          @if($order->status == 'ditolak')<span class="col-sm-6">Ditolak</span>@endif
          @if($order->status == 'selesai')<span class="col-sm-6">Selesai</span>@endif
        </div>
      </form>
    </div>

    <button type="button" name="button" id="save-button" class="btn btn-primary mt-3">Simpan</button>
    <a href="/mitra/Orders" class="btn btn-secondary mt-3">Batal</a>

@endsection

@section('footer')
  <!-- <script>
    @if(Session::has('success'))
      toastr.options.progressBar = true;
      toastr.success("{{ Session::get('success') }}", "Sukses", {timeOut: 5000});
    @endif
  </script> -->
  <script>
    $(document).ready(function() {
      $("#save-button").click(function() {
         $("#order_status_change_form").submit();
      });
    });
  </script>
@endsection
