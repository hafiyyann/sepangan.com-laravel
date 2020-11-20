@extends('layouts.superadmin.app')

@section('header')
  <title>Dashboard</title>
  <link href="{{ url('/css/adminLapangan/style.css') }}" rel="stylesheet" media="all">
@endsection


@section('content')
<div class="main-content">
  <div class="row no-gutters section-1">
    <h1 class="col-md-12 title-row">Ringkasan</h1>
    <div class="col-md-2 p-3 shadow bg-white text-center rounded card">
      <h5>Total Lapangan</h5>
      <h1>10</h1>
    </div>
    <div class="col-md-2 p-3 shadow bg-white text-center rounded card">
      <h5>Pesanan Masuk</h5>
      <h1>20</h1>
    </div>
    <div class="col-md-2 p-3 shadow bg-white text-center rounded card">
      <h5>Pesanan Selesai</h5>
      <h1>8</h1>
    </div>

  </div>
</div>
@endsection
