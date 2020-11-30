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

    <form class="bg-white p-5 rounded shadow align-items-center" action="/admin/withdrawal/{{$withdrawal_data->id}}/detail/upload" method="post" enctype="multipart/form-data">
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
      <div class="row align-items-center mb-3">
        <span class="col-sm-2">Status Pencairan</span>
        <select name="withdrawal_status" class="form-control col-sm-4 @error('withdrwal_status') is-invalid @enderror" id="withdrwal_status"  @if($withdrawal_data->status == 'dicairkan') disabled @endif>
          <option hidden selected value>Pilih Status</option>
          <option value="diproses" @if($withdrawal_data->status == 'diproses') selected @endif>Diproses</option>
          <option value="dicairkan" @if($withdrawal_data->status == 'dicairkan') selected @endif>Dicairkan</option>
        </select>
      </div>
      <div class="row align-items-center">
        <form>
          @csrf
          @if($withdrawal_data->bukti == null)
            <div class="col-sm-2">
              Upload Bukti Pembayaran
            </div>
            <div class="custom-file col-sm-4">
              <input type="file" class="custom-file-input" id="customFile" name="bukti">
              <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
            <button type="submit" class="ml-2 btn btn-primary">Upload</button>
          @endif
          @if($withdrawal_data->bukti != null)
            <div class="col-md-12">
              <div class="row">
                <span class="col-md-2">Bukti Pembayaran</span>
                <span class="col-md-6">{{$withdrawal_data->bukti}}</span>
              </div>
            </div>
          @endif
        </form>
      </div>
    </form>
    <div class="row no-gutters my-3">
      <a href="/admin/withdrawal" class="btn btn-secondary shadow">Kembali</a>
    </div>
  </div>
@endsection

@section('footer')
<script type="text/javascript">
    $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>
@endsection
