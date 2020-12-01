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
            <h1>Daftar Order</h1>
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
                  @foreach($orders as $order)
                    @foreach($fields as $field)
                      @if($order->lapangan_id == $field->id)
                        <tr>
                            <td class="align-middle text-center">{{ $order->id }}</td>
                            <td class="align-middle text-center">{{ $order->tanggalPemesanan }}</td>
                            <td class="align-middle text-center">{{ $order->start}}</td>
                            <td class="align-middle text-center">{{ $order->end}}</td>
                            <td class="align-middle text-center">{{ $field->nama }}</td>
                            <td class="align-middle text-center text-white">
                              @if( $order->status == 'dibayar' )<span class="bg-warning p-2" style="border-radius: 1.5em; font-size: 0.7em;">Dibayar</span>@endif
                              @if( $order->status == 'dikonfrimasi' )<span class="bg-warning p-2" style="border-radius: 1.5em; font-size: 0.7em;">Dikonfirmasi</span>@endif
                              @if( $order->status == 'ditolak' )<span class="bg-warning p-2" style="border-radius: 1.5em; font-size: 0.7em;">Ditolak</span>@endif
                              @if( $order->status == 'selesai' )<span class="bg-success p-2" style="border-radius: 1.5em; font-size: 0.7em;">Selesai</span>@endif
                            </td>
                            <td class="text-center"> <a href="/mitra/Orders/{{$order->id}}/lihat" class="btn btn-primary">Lihat</a> </td>
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
