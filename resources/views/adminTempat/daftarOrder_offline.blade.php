@extends('layouts.adminTempat.app')

@section('header')
  <title>Daftar Order</title>
  <link href="{{ url('/css/adminLapangan/daftarLapangan.css') }}" rel="stylesheet" media="all">
@endsection

@section('content')
  <div class="main-content">
    <div class="row no-gutters title-page">
      <div class="col-sm-9">
        <div class="row">
          <div class="col-sm-12 col-12 mb-2">
            <h1 class="mb-2">Daftar Order Offline</h1>
            <a href="/mitra/Orders/Offline/tambah" class="btn btn-warning text-white shadow-sm">+ Tambah Pesanan</a>
          </div>
        </div>
      </div>
    </div>
    <div class="row no-gutters table-lapangan">
      <div class="col-md-12">
        <div class="table-responsive table--no-card m-b-40">
            <table class="table table-borderless table-striped table-earning">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">Tanggal Sewa</th>
                        <th class="text-center">Jam Mulai</th>
                        <th class="text-center">Jam Selesai</th>
                        <th class="text-center">Lapangan</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($OfflineOrders as $order)
                    @foreach($fields as $field)
                      @if($order->lapangan_id == $field->id)
                        <tr>
                            <td class="align-middle text-center">{{ $order->id }}</td>
                            <td class="align-middle text-center">{{ $order->tanggalPemesanan }}</td>
                            <td class="align-middle text-center">{{ $order->start}}</td>
                            <td class="align-middle text-center">{{ $order->end}}</td>
                            <td class="align-middle text-center">{{ $field->nama }}</td>
                            <td class="align-middle text-center">
                              {{ $order->status }}
                            </td>
                            <td class="text-center"> <a href="/mitra/Orders/Offline/{{$order->id}}/lihat" class="btn btn-primary">Lihat</a> </td>
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

    $(document).ready(function() {
      $('.li-pesanan').addClass('active');
    });
  </script>
@endsection
