@extends('layouts.superadmin.app')

@section('header')
  <title>Daftar Lapangan</title>
  <link href="{{ url('/css/adminLapangan/daftarLapangan.css') }}" rel="stylesheet" media="all">
@endsection

@section('content')
  <div class="main-content">
    <div class="row no-gutters title-page">
      <div class="col-sm-12">
        <div class="row align-items-center">
          <div class="col-sm-6 col-12 mb-2">
            <h1 class="mb-0">Daftar Order</h1>
          </div>
          <!-- <div class="col-sm-6">
            <form>
              <div class="row no-gutters align-items-center">
                <label for="order_status_input" class="col text-right mr-3">Status Order</label>
                <select class="form-control col-3" id="order_status_input">
                  <option selected value="semua">Semua</option>
                  <option value="dibuat">Dibuat</option>
                  <option value="dibayar">Dibayar</option>
                  <option value="dikonfrimasi">Dikonfirmasi</option>
                  <option value="selesai">Selesai</option>
                  <option value="expired">Expired</option>
                  <option value="ditolak">Ditolak</option>
                </select>
              </div>
            </form>
          </div> -->
        </div>
      </div>
    </div>
    <div class="row no-gutters table-lapangan">
      <div class="col-md-12">
        <div class="table-responsive table--no-card m-b-40">
            <table class="table table-borderless table-striped table-earning" id="order_table">
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
                      @if($order->id_lapangan == $field->id)
                        <tr>
                            <td class="align-middle text-center">{{ $order->id }}</td>
                            <td class="align-middle text-center">{{ $order->tanggalPemesanan }}</td>
                            <td class="align-middle text-center">{{ $order->start}}</td>
                            <td class="align-middle text-center">{{ $order->end}}</td>
                            <td class="align-middle text-center">{{ $field->nama }}</td>
                            <td class="align-middle text-center text-white">
                              @if( $order->status == 'dibuat' )<span class="bg-warning p-2" style="border-radius: 1.5em; font-size: 0.7em;">Dibuat</span>@endif
                              @if( $order->status == 'dibayar' )<span class="bg-warning p-2" style="border-radius: 1.5em; font-size: 0.7em;">Dibayar</span>@endif
                              @if( $order->status == 'dikonfrimasi' )<span class="bg-warning p-2" style="border-radius: 1.5em; font-size: 0.7em;">Dikonfirmasi</span>@endif
                              @if( $order->status == 'ditolak' )<span class="bg-danger p-2" style="border-radius: 1.5em; font-size: 0.7em;">Ditolak</span>@endif
                              @if( $order->status == 'expired' )<span class="bg-danger p-2" style="border-radius: 1.5em; font-size: 0.7em;">Expired</span>@endif
                              @if( $order->status == 'selesai' )<span class="bg-success p-2" style="border-radius: 1.5em; font-size: 0.7em;">Selesai</span>@endif
                            </td>
                            <td class="text-center"> <a href="/admin/Orders/{{$order->id}}/lihat" class="btn btn-primary">Lihat</a> </td>
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
  <!-- <script src = "http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer ></script> -->
  <script>
    @if(Session::has('success'))
      toastr.options.progressBar = true;
      toastr.success("{{ Session::get('success') }}", "Sukses", {timeOut: 5000});
    @endif
  </script>
  <!-- <script>
    $(document).ready(function(){

     fetch_data();

     function fetch_data(order_status_input = '')
     {
      $('#order_table').DataTable({
       processing: true,
       serverSide: true,
       ajax: {
        url:"{{ url('status_filtering') }}",
        data: {order_status_input:status}
       },
      });
     }

     $('#order_status_input').change(function(){
      var status = $('#order_status_input').val();

      $('#order_table').DataTable().destroy();

      fetch_data(status);
     });

    });
  </script> -->
@endsection
