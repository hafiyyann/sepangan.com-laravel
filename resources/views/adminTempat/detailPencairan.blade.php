@extends('layouts.adminTempat.app')

@section('header')
  <title>Pencairan Dana</title>
  <link href="{{ url('/css/adminLapangan/daftarLapangan.css') }}" rel="stylesheet" media="all">
@endsection

@section('content')
  <div class="main-content">
    <!-- page title -->
    <div class="row no-gutters title-page">
      <div class="col-sm-12 text-left">
        <h2>Detail Permohonan Pencairan Dana</h2>
      </div>
    </div>

    <form class="bg-white p-5 rounded shadow align-items-center" action="index.html" method="post">
      <div class="form-group">
        <label for="input_kredit">Nominal Pencairan</label>
        <input type="text" name="input_kredit" class="form-control @error('input_kredit') is-invalid @enderror" id="input_kredit" value="Rp. {{$withdrawal_data->kredit}}" disabled>
        @error('input_kredit')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-group">
        <label for="bank">Bank Penerima</label>
        <input type="text" name="input_kredit" class="form-control @error('input_kredit') is-invalid @enderror" id="input_kredit" value="{{$withdrawal_data->bank}}" disabled>
        @error('bank')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-group">
        <label for="input_kredit">Masukkan Nomor Rekening</label>
        <input type="text" name="input_kredit" class="form-control @error('input_kredit') is-invalid @enderror" id="input_kredit" value="{{$withdrawal_data->nomor_rekening}}" disabled>
        @error('input_kredit')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-group">
        <label for="input_kredit">Atas Nama</label>
        <input type="text" name="input_kredit" class="form-control @error('input_kredit') is-invalid @enderror" id="input_kredit" value="{{$withdrawal_data->atas_nama}}" disabled>
        @error('input_kredit')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="row align-items-center">
        <span class="col-auto">Status Pencairan</span>
        <span class="bg-warning py-1 px-5 rounded text-white mr-2">{{$withdrawal_data->status}}</span>
        @if($withdrawal_data->bukti != null)
          <a href="#" id="modal-bukti" class="btn btn-primary py-1">
            <img id="imageresource" src="{{ asset('/images/'.$withdrawal_data->bukti)}}" hidden>
            Lihat
          </a>
        @endif
      </div>
    </form>
    <div class="row no-gutters my-3">
      <a href="/mitra/withdrawal" class="btn btn-secondary shadow">Kembali</a>
    </div>
  </div>

  <!-- bootstrap modal image -->
  <div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        </div>
        <div class="modal-body">
          <img src="" id="imagepreview" class="img-fluid">
        </div>
      </div>
    </div>
  </div>
@endsection

@section('footer')
<script>
    $("#modal-bukti").on("click", function() {
      $('#imagepreview').attr('src', $('#imageresource').attr('src')); // here asign the image to the modal when the user click the enlarge link
      $('#imagemodal').modal('show'); // imagemodal is the id attribute assigned to the bootstrap modal, then i use the show function
    });

    $(document).ready(function() {
      $("#status-submit-btn").click(function() {
         $("#status-form").submit();
      });
    });
</script>
@endsection
