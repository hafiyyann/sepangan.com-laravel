@extends('layouts.adminTempat.app')

@section('header')
  <title>Tambah Lapangan</title>
  <link href="{{ url('/css/adminLapangan/daftarLapangan.css') }}" rel="stylesheet" media="all">
  <script src="https://cdn.ckeditor.com/ckeditor5/23.1.0/classic/ckeditor.js"></script>
@endsection

@section('content')
  <div class="main-content">
    <!-- page title -->
    <div class="row no-gutters title-page">
      <div class="col-sm-9">
        <h2>Tambah Artikel</h2>
      </div>
    </div>
    <!-- Form -->
    <form class="bg-white p-4 rounded clearfix shadow-sm" method="post" action="/admin/Artikel/{{$Article->id}}/edit" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label for="input_nama">Nama Penulis</label>
        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="input_nama" placeholder="Masukkan nama Penulis..." value="{{$Article->author}}">
        @error('nama')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-group">
        <label for="input_title">Judul Artikel</label>
        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="input_title" placeholder="Judul Artikel" value="{{$Article->title}}">
        @error('title')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-group">
        <label for="isi">Isi Artikel</label>
        <textarea class="form-control" id="isi" rows="20" name="content">{{$Article->content}}</textarea>
      </div>
      <button type="submit" class="btn btn-primary float-right">Update</button>
      <a href="/admin/Artikel/{{$Article->id}}/detail" class="btn btn-danger float-right mr-2">Batal</a>
    </form>
  </div>
@endsection

@section('footer')
  <script>
      ClassicEditor
          .create( document.querySelector( '#isi' ) )
          .catch( error => {
              console.error( error );
          } );
  </script>
@endsection
