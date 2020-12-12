@extends('layouts.adminTempat.app')

@section('header')
  <title>Pencairan Dana</title>
  <link href="{{ url('/css/adminLapangan/daftarLapangan.css') }}" rel="stylesheet" media="all">
@endsection

@section('content')
  <div class="main-content">
    <!-- page title -->
    <div class="row no-gutters title-page">
      <div class="col-sm-12 text-center">
        <h2>Pencairan Dana</h2>
      </div>
    </div>

    <div class="row no-gutters my-3">
      <div class="col-sm-12 text-center">
        <span>Saldo anda saat ini</span>
        <h1 style="font-size: 100px;" class="p-4">Rp {{ $saldo }}</h1>
        <a href="/mitra/withdrawal/form" class="btn btn-warning shadow-sm text-white">+ Ajukan Pencairan</a>
      </div>
    </div>

    <div class="row no-gutters justify-content-md-center">
      <div class="col-md-9">
        <div class="table-responsive table--no-card m-b-40">
            <table class="table table-borderless table-striped table-earning">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">Tanggal Pengajuan</th>
                        <th class="text-center">Kredit</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($withdrawals as $withdrawal)
                    <tr>
                        <td class="align-middle text-center">{{$withdrawal->id}}</td>
                        <td class="align-middle text-center">{{$withdrawal->tanggal_pengajuan}}</td>
                        <td class="align-middle text-center">Rp. {{$withdrawal->kredit}}</td>
                        <td class="align-middle text-center">{{$withdrawal->status}}</td>
                        <td class="text-center"> <a href="/mitra/withdrawal/{{$withdrawal->id}}/detail" class="btn btn-primary">Lihat</a></td>
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

    @if(Session::has('fail'))
      toastr.options.progressBar = true;
      toastr.error("{{ Session::get('fail') }}", "Gagal", {timeOut: 5000});
    @endif

    $(document).ready(function() {
      $('.li-pencairan').addClass('active');
    });
  </script>
@endsection
