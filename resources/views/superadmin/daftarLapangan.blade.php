@extends('layouts.superadmin.app')

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
          <!-- <div class="col-sm-12 col-12 mb-2">
            <a href="{{ url('/mitra/lapangan/tambah') }}" class="btn btn-primary">+ Tambah Lapangan</a>
          </div> -->
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
                        <th class="text-center">Nama lapangan</th>
                        <th class="text-center">Nama Tempat</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($data_lapangan as $lapangan)
                    @foreach($data_tempat as $tempat)
                      @if($tempat->id == $lapangan->tempat_id)
                        <tr>
                            <td class="align-middle text-center">{{ $lapangan->id }}</td>
                            <td class="align-middle text-center">{{ $lapangan->nama }}</td>
                            <td class="align-middle text-center">{{ $tempat->namaTempat}}</td>
                            <td class="text-center"> <a href="/admin/Lapangan/{{$lapangan->id}}/lihat" class="btn btn-primary">Lihat</a> </td>
                        </tr>
                      @endif
                    @endforeach
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
  </script>
@endsection
