@extends('layouts.adminTempat.app')

@section('header')
  <title>Tambah Lapangan</title>
  <link href="{{ url('/css/adminLapangan/daftarLapangan.css') }}" rel="stylesheet" media="all">
@endsection

@section('content')
  <div class="main-content">
    <!-- page title -->
    <div class="row no-gutters title-page">
      <div class="col-sm-9">
        <h2>Tambah Order</h2>
      </div>
    </div>
    <!-- Form -->
    <form class="bg-white p-4 rounded clearfix shadow-sm" method="post" action="/mitra/Orders/Offline/tambah" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label for="input_nama">Nama Pemesan</label>
        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="input_nama" placeholder="Masukkan nama pemesan..." value="{{ old('nama') }}">
        @error('nama')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-group">
        <label for="input_nomorTelepon">Nomor Telepon</label>
        <input type="text" name="nomorTelepon" class="form-control @error('nama') is-invalid @enderror" id="input_nomorTelepon" placeholder="Masukkan nomor telepon..." value="{{ old('nomorTelepon') }}">
        @error('nomorTelepon')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-group">
        <label for="lapangan">Pilih Lapangan</label>
        <select name="lapangan" class="form-control @error('lapangan') is-invalid @enderror" id="jenis_olahraga">
          <option hidden selected value>Pilih Lapangan</option>
          @foreach($fields as $field)
            <option value="{{$field->id}}">{{$field -> nama}}</option>
          @endforeach
        </select>
        @error('lapangan')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="row">
        <div class="form-group col-md-4">
          <label for="input_tanggal">Tanggal</label>
          <input class="date form-control @error('tanggal') is-invalid @enderror"  type="date" id="dateControl" name="tanggal">
          @error('tanggal')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group col-md-4">
          <label for="start">Jam Mulai</label>
          <select name="start" class="form-control @error('start') is-invalid @enderror" id="start">
            <option hidden selected value>Pilih Jam Mulai</option>
          </select>
          @error('start')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group col-md-4">
          <label for="end">Jam Selesai</label>
          <select name="end" class="form-control @error('start') is-invalid @enderror" id="end">
            <option hidden selected value>Pilih Jam Selesai</option>
          </select>
          @error('end')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
      </div>
      <div class="form-group">
        <label for="input_catatan">Catatan</label>
        <textarea name="catatan" class="form-control" id="input_catatan" rows="5" cols="80" placeholder="Masukkan catatan...">{{ old('catatan') }}</textarea>
      </div>
      <div class="form-group">
        <label for="input_sewa">Total Harga Sewa</label>
        <input name="sewa" type="text" class="form-control @error('sewa') is-invalid @enderror" id="input_sewa" placeholder="Masukkan total harga sewa..." value="{{ old('sewa') }}">
        @error('sewa')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <a href="{{ url('/mitra/Orders/Offline') }}" class="btn btn-secondary">Batal</a>
      <button type="submit" class="btn btn-primary float-right">Tambah</button>
    </form>
  </div>
@endsection

@section('footer')
  <script>
    var dateToday = new Date();

    var month = dateToday.getMonth() + 1;
    var day = dateToday.getDate();
    var year = dateToday.getFullYear();

    if(month < 10)
      month = '0' + month.toString();

    if(day < 10)
      day = '0' + day.toString();

    var maxDate = year + '-' + month + '-' + day;

    $('#dateControl').attr('min', maxDate);

    $('#dateControl').on('change',function() {
      var SelectedDate = new Date($('#dateControl').val());

      var SelectedDay = SelectedDate.getDate();
      var SelectedMonth = SelectedDate.getMonth()+1;
      var SelectedYear = SelectedDate.getFullYear();

      if(SelectedMonth < 10){
        SelectedMonth = '0' + SelectedMonth.toString();
      }

      if(SelectedDay < 10){
        SelectedDay = '0' + SelectedDay.toString();
      }

      var SelectedDateNew = SelectedYear + '-' + SelectedMonth + '-' + SelectedDay;

      $('#start').find('option').remove();
      $('#end').find('option').remove();
      $('#start').append('<option hidden selected value>Pilih Jam Mulai</option>');
      $('#end').append('<option hidden selected value>Pilih Jam Selesai</option>');

      if(SelectedDateNew == maxDate){
        var formatted = dateToday.getHours();

        if (formatted < 9) {
          formatted = 8;
        }

        for (i = formatted+1; i <= 22; i++) {
          if (i < 10) {
            var x = '0' + i;
            $('#start').append('<option>'+x+':00'+'</option>');
          } else {
            $('#start').append('<option>'+i+':00'+'</option>');
          }

          $('#end').append('<option>'+(i+1)+':00'+'</option>');
        }
      }

      if(SelectedDateNew !== maxDate){
        for (i = 9; i <= 22; i++){
          if (i < 10) {
            var x = '0' + i;
            $('#start').append('<option value="'+i+'">'+x+':00'+'</option>');
          } else {
            $('#start').append('<option value="'+i+'">'+i+':00'+'</option>');
          }
        }

        $('#start').on('change',function(){
          $('#end').find('option').remove();
          $('#end').append('<option hidden selected value>Pilih Jam Selesai</option>');

          var selectedStart = $("#start :selected").val();

          for (i = selectedStart ; i < 23; i++) {
            var y = Number(i)+1;

            $('#end').append('<option value="'+y+'">'+y+':00'+'</option>');
          }

        })
      }
    });

    @if(Session::has('fail'))
      toastr.options.progressBar = true;
      toastr.error("{{ Session::get('fail') }}", "Gagal", {timeOut: 5000});
    @endif
  </script>
@endsection
