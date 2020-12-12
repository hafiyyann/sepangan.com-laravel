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
        <h2>Tambah Order</h2>
      </div>
    </div>
    <!-- Form -->
    <form class="bg-white p-4 rounded clearfix shadow-sm" method="post" action="/mitra/Orders/Offline/tambah" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label for="input_nama">Nama Pemesan</label>
        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="input_nama" placeholder="Masukkan nama pemesan...">
        @error('nama')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-group">
        <label for="input_nomorTelepon">Nomor Telepon</label>
        <input type="text" name="nomorTelepon" class="form-control @error('nama') is-invalid @enderror" id="input_nomorTelepon" placeholder="Masukkan nomor telepon...">
        @error('nomorTelepon')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-group">
        <label for="lapangan">Pilih Lapangan</label>
        <select name="lapangan" class="form-control @error('lapangan') is-invalid @enderror" id="jenis_olahraga">
          <option hidden selected value>Pilih Lapangan</option>
          @foreach($fields as $field)
            <option value="{{$field->id}}">{{$field -> nama}}</option>
          @endforeach
        </select>
        @error('lapangan')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="row">
        <div class="form-group col-md-4">
          <label for="input_tanggal">Tanggal</label>
          <input class="form-control @error('tanggal') is-invalid @enderror" type="date" name="tanggal">
          @error('tanggal')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group col-md-4">
          <label for="start">Jam Mulai</label>
          <select name="start" class="form-control @error('start') is-invalid @enderror" id="start">
            <option hidden selected value>Jam Mulai</option>
            <option>09:00</option>
            <option>10:00</option>
            <option>11:00</option>
            <option>12:00</option>
            <option>13:00</option>
            <option>14:00</option>
            <option>15:00</option>
            <option>16:00</option>
            <option>17:00</option>
            <option>18:00</option>
            <option>19:00</option>
            <option>20:00</option>
            <option>21:00</option>
            <option>22:00</option>
            <option>23:00</option>
          </select>
          @error('start')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group col-md-4">
          <label for="end">Jam Selesai</label>
          <select name="end" class="form-control @error('start') is-invalid @enderror" id="end">
            <option hidden selected value>Jam Mulai</option>
            <option>09:00</option>
            <option>10:00</option>
            <option>11:00</option>
            <option>12:00</option>
            <option>13:00</option>
            <option>14:00</option>
            <option>15:00</option>
            <option>16:00</option>
            <option>17:00</option>
            <option>18:00</option>
            <option>19:00</option>
            <option>20:00</option>
            <option>21:00</option>
            <option>22:00</option>
            <option>23:00</option>
          </select>
          @error('end')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
      </div>
      <div class="form-group">
        <label for="input_catatan">Catatan</label>
        <textarea name="catatan" class="form-control" id="input_catatan" rows="5" cols="80" placeholder="Masukkan catatan..."></textarea>
      </div>
      <div class="form-group">
        <label for="input_sewa">Total Harga Sewa</label>
        <input name="sewa" type="text" class="form-control @error('sewa') is-invalid @enderror" id="input_sewa" placeholder="Masukkan total harga sewa...">
        @error('sewa')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <a href="{{ url('/mitra/Orders') }}" class="btn btn-secondary">Batal</a>
      <button type="submit" class="btn btn-primary float-right">Tambah</button>
    </form>
  </div>
@endsection
