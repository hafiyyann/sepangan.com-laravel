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
        <h2>Ubah Lapangan</h2>
      </div>
    </div>
    <!-- picture show -->
    <div class="row no-gutters mb-3">
      <img src="{{ asset('images/'.$data_lapangan->gambar) }}"  style="height: 300px;" class="img-thumbnail">
    </div>
    <!-- Form -->
    <form class="bg-white p-4 rounded clearfix shadow-sm" method="post" action="/mitra/lapangan/{{$data_lapangan->id}}/update" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label for="input_nama">Nama Lapangan</label>
        <input name="nama" type="text" class="form-control @error('nama') is-invalid @enderror" id="input_nama" placeholder="Masukkan nama lapangan..." value="{{ $data_lapangan->nama }}">
        @error('nama')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-group">
        <label for="jenis_olahraga">Jenis Olahraga</label>
        <select name="jenis_olahraga" class="form-control @error('jenis_olahraga') is-invalid @enderror" id="jenis_olahraga">
          <option @if($data_lapangan->jenis_olahraga == 'Futsal') selected @endif >Futsal</option>
          <option @if($data_lapangan->jenis_olahraga == 'Badminton') selected @endif >Badminton</option>
          <option @if($data_lapangan->jenis_olahraga == 'Sepakbola') selected @endif >Sepakbola</option>
          <option @if($data_lapangan->jenis_olahraga == 'Mini-sepakbola') selected @endif >Mini-sepakbola</option>
          <option @if($data_lapangan->jenis_olahraga == 'Tennis') selected @endif >Tennis</option>
          <option @if($data_lapangan->jenis_olahraga == 'Tennis-meja') selected @endif >Tennis-meja</option>
          <option @if($data_lapangan->jenis_olahraga == 'Basket') selected @endif >Basket</option>
        </select>
        @error('jenis_olahraga')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-group">
        <label for="jenis_lapangan">Jenis Lapangan</label>
        <select name="jenis_lapangan" class="form-control @error('jenis_lapangan') is-invalid @enderror" id="jenis_lapangan">
          <option @if($data_lapangan->jenis_lapangan == 'Outdoor') selected @endif >Outdoor</option>
          <option @if($data_lapangan->jenis_lapangan == 'Indoor') selected @endif >Indoor</option>
        </select>
        @error('jenis_lapangan')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-group">
        <label for="input_sewa">Harga Sewa per jam</label>
        <input name="sewa" type="text" class="form-control @error('sewa') is-invalid @enderror" id="input_sewa" placeholder="Masukkan harga sewa lapangan..." value="{{ $data_lapangan->sewa }}">
        @error('sewa')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-group">
        <label for="gambar_lapangan">Gambar Lapangan</label>
        <input type="file" class="form-control-file" name="gambar" id="gambar">
        @error('gambar')
          <small class="text-danger">{{$message }}</small>
        @enderror
      </div>
      <div class="form-group">
        <label for="status">Status Lapangan</label>
        <select name="status" class="form-control @error('status') is-invalid @enderror" id="status">
          <option value="1" @if($data_lapangan->status == 1) selected @endif>Aktif</option>
          <option value="0" @if($data_lapangan->status == 0) selected @endif>Tidak Aktif</option>
        </select>
        @error('status')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <a class="btn btn-danger" href="/mitra/lapangan/{{$data_lapangan->id}}/lihat">Batal</a>
      <button type="submit" name="button" class="btn btn-primary float-right">Simpan</button>
    </form>
  </div>
@endsection
