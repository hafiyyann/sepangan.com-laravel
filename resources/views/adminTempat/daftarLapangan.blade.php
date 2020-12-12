@extends('layouts.adminTempat.app')

@section('header')
  <title>Daftar Lapangan</title>
  <link href="{{ url('/css/adminLapangan/daftarLapangan.css') }}" rel="stylesheet" media="all">
@endsection

@section('content')
  <div class="main-content">
    <div class="row no-gutters title-page">
      <div class="col-sm-9">
        <div class="row">
          <div class="col-sm-12 col-12 mb-2">
            <h1>Daftar Lapangan</h1>
          </div>
          <div class="col-sm-12 col-12 mb-2">
            <a href="{{ url('/mitra/lapangan/tambah') }}" class="btn btn-warning text-white shadow-sm">+ Tambah Lapangan</a>
          </div>
        </div>
      </div>
    </div>
    <div class="row no-gutters table-lapangan">
      <div class="col-md-9">
        <div class="table-responsive table--no-card m-b-40">
            <table class="table table-borderless table-striped table-earning">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th>Nama lapangan</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($data_lapangan as $lapangan)
                    <tr>
                        <td class="align-middle text-center">{{ $lapangan-> id }}</td>
                        <td class="align-middle">{{ $lapangan-> nama }}</td>
                        @if($lapangan->status == 1)<td class="align-middle text-center">Aktif</td>@endif
                        @if($lapangan->status == 0)<td class="align-middle text-center">Tidak Aktif</td>@endif
                        <td class="text-center"> <a href="/mitra/lapangan/{{$lapangan->id}}/lihat" class="btn btn-primary">Lihat</a> </td>
                    </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('footer')
  <script>
    @if(Session::has('success'))
      toastr.options.progressBar = true;
      toastr.success("{{ Session::get('success') }}", "Sukses", {timeOut: 5000});
    @endif

    $(document).ready(function() {
      $('.li-lapangan').addClass('active');
    });
  </script>
@endsection
