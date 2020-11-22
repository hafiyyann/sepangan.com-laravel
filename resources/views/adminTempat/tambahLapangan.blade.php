@extends('layouts.adminTempat.app')

@section('header')
  <title>Tambah Lapangan</title>
  <link href="{{ url('/css/adminLapangan/daftarLapangan.css') }}" rel="stylesheet" media="all">
@endsection

@section('content')
  <div class="main-content">
    <!-- page title -->
    <div class="row no-gutters title-page">
      <div class="col-sm-9">
        <h2>Tambah Lapangan</h2>
      </div>
    </div>
    <!-- Form -->
    <form class="bg-white p-4 rounded clearfix shadow-sm" method="post" action="/mitra/lapangan" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label for="input_nama">Nama Lapangan</label>
        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="input_nama" placeholder="Masukkan nama lapangan...">
        @error('nama')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-group">
        <label for="jenis_olahraga">Jenis Olahraga</label>
        <select name="jenis_olahraga" class="form-control @error('jenis_olahraga') is-invalid @enderror" id="jenis_olahraga">
          <option hidden selected value>Pilih Jenis Olahraga</option>
          <option>Futsal</option>
          <option>Badminton</option>
          <option>Sepakbola</option>
          <option>Mini-sepakbola</option>
          <option>Tennis</option>
          <option>Tennis-meja</option>
          <option>Basket</option>
        </select>
        @error('jenis_olahraga')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-group">
        <label for="jenis_lapangan">Jenis Lapangan</label>
        <select name="jenis_lapangan" class="form-control @error('jenis_lapangan') is-invalid @enderror" id="jenis_lapangan">
          <option hidden selected value>Pilih Jenis Lapangan</option>
          <option>Outdoor</option>
          <option>Indoor</option>
        </select>
        @error('jenis_lapangan')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-group">
        <label for="input_sewa">Harga Sewa per jam</label>
        <input name="sewa" type="text" class="form-control @error('sewa') is-invalid @enderror" id="input_sewa" placeholder="Masukkan harga sewa lapangan...">
        @error('sewa')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-group">
        <label for="gambar_lapangan">Gambar Lapangan</label>
        <input type="file" class="form-control-file @error('gambar') is-invalid @enderror" name="gambar" id="gambar">
        @error('gambar')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <button type="submit" class="btn btn-primary float-right">Tambah</button>
    </form>
  </div>
@endsection
