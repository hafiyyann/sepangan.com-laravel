@extends('layouts.adminTempat.app')

@section('header')
  <title>Dashboard</title>
  <link href="{{ url('/css/adminLapangan/style.css') }}" rel="stylesheet" media="all">
  <style>
    #yellow-grad{
      background: linear-gradient(45deg,#FFB64D,#ffcb80);
    }

    #blue-grad{
      background: linear-gradient(45deg,#4099ff,#73b4ff);
    }

    #green-grad{
      background: linear-gradient(45deg,#2ed8b6,#59e0c5);
    }

    #pink-grad{
      background: linear-gradient(45deg,#FF5370,#ff869a);
    }
  </style>
@endsection


@section('content')
<div class="main-content">
  <div class="row no-gutters section-1">
    <h1 class="col-md-12 title-row">Ringkasan</h1>
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-3 px-3">
          <div class="shadow p-3 text-center rounded card border-0" id="yellow-grad">
            <h5 class="text-white">Total Lapangan</h5>
            <h1 class="text-white">10</h1>
          </div>
        </div>
        <div class="col-md-3 px-3">
          <div class="shadow p-3 text-center rounded card border-0" id="blue-grad">
            <h5 class="text-white">Pesanan Masuk</h5>
            <h1 class="text-white">20</h1>
          </div>
        </div>
        <div class="col-md-3 px-3">
          <div class="shadow p-3 bg-white text-center rounded card border-0" id="green-grad">
            <h5 class="text-white">Pesanan Selesai</h5>
            <h1 class="text-white">8</h1>
          </div>
        </div>
        <div class="col-md-3 px-3">
          <div class="shadow p-3 bg-white text-center rounded card border-0" id="pink-grad">
            <h5 class="text-white">Pencairan</h5>
            <h1 class="text-white">1</h1>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('footer')
 <script>
   $(document).ready(function() {
     $('.li-dashboard').addClass('active');
   });
 </script>
@endsection
