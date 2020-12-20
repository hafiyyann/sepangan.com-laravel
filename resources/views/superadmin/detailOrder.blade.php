@extends('layouts.superadmin.app')

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
      <h4 class="col-sm-12">Ubah Status Pembayaran</h5>
      <form class="col-sm-8 mt-3" id="status-form" action="/admin/Orders/{{$order->id}}/Ubah-Status" method="post">
        @csrf
        <div class="form-group row">
          <label for="bukti_pembayaran" class="col-sm-6">Bukti Pembayaran</label>
          <input type="text" class="col-sm-4" name="bukti_pembayaran" @if($data_pembayaran->bukti == null) value = "Belum Ada Bukti" @else value= "{{$data_pembayaran->bukti}}" @endif>
          @if($data_pembayaran->bukti != null)
            <a href="#" id="modal-bukti" class="btn btn-primary col-sm-2">
              <img id="imageresource" src="{{ asset('/images/'.$data_pembayaran->bukti)}}" hidden>
              Lihat
            </a>
          @endif
        </div>
        <div class="form-group row">
          <label for="payment_status" class="col-sm-6">Status Pembayaran</label>
          @if($data_pembayaran->status == 'belum dibayar' || $data_pembayaran->status == 'verifikasi gagal')
            <select name="payment_status" class="form-control @error('start') is-invalid @enderror col-sm-6" id="payment_status">
              <option hidden selected value>Pilih Status</option>
              <option >Dibayar</option>
              <option @if($data_pembayaran->status == 'belum dibayar') selected @endif>Belum Dibayar</option>
              <option @if($data_pembayaran->status == 'verifikasi gagal') selected @endif>Verifikasi Gagal</option>
            </select>
          @endif
          @if($data_pembayaran->status == 'dibayar')
            <span class="col-sm-6">Dibayar</span>
          @endif
          @if($data_pembayaran->status == 'expired')
            <span class="col-sm-6">Expired</span>
          @endif
        </div>
      </form>
    </div>

    <!-- bootstrap modal image -->
    <div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          </div>
          <div class="modal-body">
            <img src="" id="imagepreview" class="img-fluid">
          </div>
        </div>
      </div>
    </div>

    @if($data_pembayaran->status === 'belum dibayar' || $data_pembayaran->status === 'verifikasi gagal')
      <button type="button" id="status-submit-btn" class="btn btn-primary mt-3">Simpan</button>
    @endif
    <a href="/admin/Orders" class="btn btn-secondary mt-3">Batal</a>

@endsection

@section('footer')
  <script>
      $("#modal-bukti").on("click", function() {
        $('#imagepreview').attr('src', $('#imageresource').attr('src')); // here asign the image to the modal when the user click the enlarge link
        $('#imagemodal').modal('show'); // imagemodal is the id attribute assigned to the bootstrap modal, then i use the show function
      });

      $(document).ready(function() {
        $("#status-submit-btn").click(function() {
           $("#status-form").submit();
        });
      });
    // @if(Session::has('success'))
    //   toastr.options.progressBar = true;
    //   toastr.success("{{ Session::get('success') }}", "Sukses", {timeOut: 5000});
    // @endif
  </script>
@endsection
