@extends('layouts.superadmin.app')

@section('header')
  <title>Detail Tempat</title>
  <link href="{{ url('/css/adminLapangan/daftarLapangan.css') }}" rel="stylesheet" media="all">
@endsection

@section('content')
  <div class="main-content">
    <div class="row no-gutter title-page">
      <div class="col-sm-9">
        <h2>Detail Artikel</h2>
      </div>
    </div>

    <div class="row no-gutters p-5 shadow-sm bg-white rounded justify-content-center">
      <h1 class="col-8">{{ $Article->title }}</h1><br>
      <h5 class="col-8">{{ $Article->author }}</h5><br>
      <span class="col-8">{!! $Article->content !!}</span>
    </div>
    <div class="row no-gutters mt-3 justify-content-end">
      <a href="/admin/Artikel" class="btn btn-secondary mr-auto">Kembali</a>
      <a href="/admin/Artikel/{{$Article->id}}/edit" class="btn btn-primary">Edit</a>
      <a href="/admin/Artikel/{{$Article->id}}/hapus" class="btn btn-danger ml-2">Hapus</a>
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
