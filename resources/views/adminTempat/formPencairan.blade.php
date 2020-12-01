@extends('layouts.adminTempat.app')

@section('header')
  <title>Pencairan Dana</title>
  <link href="{{ url('/css/adminLapangan/daftarLapangan.css') }}" rel="stylesheet" media="all">
@endsection

@section('content')
  <div class="main-content">
    <!-- page title -->
    <div class="row no-gutters title-page">
      <div class="col-sm-12 text-left">
        <h2>Form Pencairan Dana</h2>
      </div>
    </div>

    <form class="bg-white p-5 rounded shadow align-items-center" action="/mitra/withdrawal/form" method="post" id="withdrawal_form">
      @csrf
      <div class="text-center">
        <span class="d-block">Saldo saat ini</span>
        <span style="font-size: 2em;"><b>Rp. {{$tempat->saldo}}</b></span>
      </div>
      <div class="form-group">
        <label for="input_kredit">Nominal Pencairan</label>
        <input type="text" name="input_kredit" class="form-control @error('input_kredit') is-invalid @enderror" id="input_kredit" placeholder="Masukkan nominal pencairan...">
        @error('input_kredit')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-group">
        <label for="input_bank">Bank Penerima</label>
        <select name="input_bank" class="form-control @error('input_bank') is-invalid @enderror" id="input_bank">
          <option hidden selected value>Pilih Bank Penerima</option>
          <option>BCA</option>
          <option>BNI</option>
          <option>Mandiri</option>
          <option>BRI</option>
        </select>
        @error('input_bank')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-group">
        <label for="input_nomor_rekening">Masukkan Nomor Rekening</label>
        <input type="text" name="input_nomor_rekening" class="form-control @error('input_nomor_rekening') is-invalid @enderror" id="input_nomor_rekening" placeholder="Masukkan nomor rekening...">
        @error('input_nomor_rekening')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-group">
        <label for="input_atas_nama">Atas Nama</label>
        <input type="text" name="input_atas_nama" class="form-control @error('input_atas_nama') is-invalid @enderror" id="input_atas_nama" placeholder="Masukkan atas nama rekening...">
        @error('input_atas_nama')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
    </form>
    <div class="row no-gutters my-3">
      <button type="button" id="submit_button" class="btn btn-primary ml-auto shadow">Ajukan</button>
      <a href="/mitra/withdrawal" class="btn btn-secondary ml-1 shadow">Batal</a>
    </div>
  </div>
@endsection

@section('footer')
  <script>
    $(document).ready(function() {
       $("#submit_button").click(function() {
           $("#withdrawal_form").submit();
       });
    });
</script>
@endsection
