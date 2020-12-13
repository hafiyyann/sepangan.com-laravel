@extends('layouts.app')


@section('head')
  <title>Home</title>
  <link rel="stylesheet" href="{{ url('/css/user/style.css')}}">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  <link rel="stylesheet" href="{{ url('/vendor/owlcarousel/assets/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{ url('/vendor/owlcarousel/assets/owl.theme.default.min.css')}}">
  <style>
    .owl-prev {
      left: -30px;
    }

    .owl-next {
      right: -30px;
    }

    .owl-prev, .owl-next{
      position: absolute;
      top: 30%;
    }

    .owl-prev span, .owl-next span{
      font-size: 60px;
      color: #787878;
    }

    .owl-theme .owl-nav [class*="owl-"]:hover {
      background-color: transparent;
    }
  </style>
@endsection


@section('content')
  <!-- navigation -->
  <nav class="navbar navbar-expand-lg bg-warning">
    <div class="container">
      <a class="navbar-brand text-white" href="#">
        <img src="{{ url('/images/login_asset.png') }}" height="30" alt="">
        <span style="font-weight: 700">SEPANGAN.CO.ID</span>
      </a>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto navbar-right">
          <li class="nav-item">
            <a class="nav-link text-white" href="{{ url('/') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="{{ url('/artikel') }}">Artikel</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="#">Tentang Kami</a>
          </li>
          @if (Auth::check())
            <li class="nav-item dropdown">
             <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               {{ Illuminate\Support\Str::words(auth()->user()->name, 1) }}
             </a>
             <div class="dropdown-menu" aria-labelledby="navbarDropdown">
               <a class="dropdown-item" href="/profil">Akun Saya</a>
               <a class="dropdown-item" href="/riwayat">Riwayat</a>
               <div class="dropdown-divider"></div>
               <a class="dropdown-item" href="/logout">Logout</a>
             </div>
            </li>
          @else
            <li class="nav-item">
              <a class="nav-link text-white" href="/login">Masuk</a>
            </li>
          @endif
        </ul>
      </div>
    </div>
  </nav>
  <!-- Main Content -->
  <div class="bg-1">
    <div class="container">
      <div class="row align-items-center home-content">
        <div class="col-md-5">
          <img src="{{ url('/images/login_asset.png') }}"  height="200px" alt="">
          <h1>SELAMAT DATANG!</h1>
          <h2>Menyewa lapangan lebih mudah dengan <b>Sepangan.co.id</b></h2>
        </div>
        <div class="col-md-7 sewa-warp">
            <h1>Sewa Sekarang!</h1>
            <form class="sewa-section shadow" action="/pencarian" method="post">
              @csrf
              <div class="row">
                <div class="form-group col-md-12">
                  <label for="jenis_olahraga">Jenis Lapangan</label>
                  <select name="jenis_olahraga" class="form-control @error('jenis_olahraga') is-invalid @enderror" id="jenis_olahraga">
                    <option hidden selected value>Jenis Lapangan</option>
                    <option>Badminton</option>
                    <option>Futsal</option>
                    <option>Sepakbola</option>
                    <option>Tennis</option>
                    <option>Mini-sepakbola</option>
                    <option>Volley</option>
                    <option>Tennis Meja</option>
                  </select>
                  @error('jenis_olahraga')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group col-md-12">
                  <label for="input_tanggal">Tanggal</label>
                  <input class="date form-control @error('tanggal') is-invalid @enderror"  type="date" id="dateControl" name="tanggal">
                  @error('tanggal')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group col-md-12">
                  <label for="start">Jam Mulai</label>
                  <select name="start" class="form-control @error('start') is-invalid @enderror" id="start">
                    <option hidden selected value>Pilih Jam Mulai</option>
                  </select>
                  @error('start')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group col-md-12">
                  <label for="end">Jam Selesai</label>
                  <select name="end" class="form-control @error('start') is-invalid @enderror" id="end">
                    <option hidden selected value>Pilih Jam Selesai</option>
                  </select>
                  @error('end')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <button type="submit" class="btn btn-primary col-md-12">Cari</button>
            </form>
        </div>
      </div>
    </div>
  </div>
  <div class="bg-2">
    <div class="container">
      <div class="row align-items-center section-2">
        <h1 class="col-md-12">Keuntungan</h1>
        <div class="col-sm-4">
          <h2>Lorem</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
        <div class="col-sm-4">
          <h2>Lorem</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
        <div class="col-sm-4">
          <h2>Lorem</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
      </div>
    </div>
  </div>
  <div class="bg-3">
    <div class="container">
      <div class="row align-items-center section-3 text-center">
        <h1 class="col-md-12">Kategori Lapangan</h1>
        <div class="col-md-3">
          <span style="font-size: 7em; color: white;">
            <i class="fas fa-futbol"></i>
          </span><br>
          <h5>Sepakbola</h5>
        </div>
        <div class="col-md-3 text-center">
          <span style="font-size: 7em; color: white;">
            <i class="fas fa-shuttlecock"></i>
          </span><br>
          <h5>Badminton</h5>
        </div>
        <div class="col-md-3 text-center">
          <span style="font-size: 7em; color: white;">
            <i class="fas fa-basketball-ball"></i>
          </span><br>
          <h5>Basketball</h5>
        </div>
        <div class="col-md-3 text-center">
          <span style="font-size: 7em; color: white;">
            <i class="far fa-futbol"></i>
          </span><br>
          <h5>Mini-Sepakbola</h5>
        </div>
        <div class="col-md-3 text-center">
          <span style="font-size: 7em; color: white;">
            <i class="fas fa-tennis-ball"></i>
          </span><br>
          <h5>Tennis</h5>
        </div>
        <div class="col-md-3 text-center">
          <span style="font-size: 7em; color: white;">
            <i class="fas fa-futbol"></i>
          </span><br>
          <h5>Futsal</h5>
        </div>
        <div class="col-md-3 text-center">
          <span style="font-size: 7em; color: white;">
            <i class="fas fa-table-tennis"></i>
          </span><br>
          <h5>Tennis Meja</h5>
        </div>
        <div class="col-md-3 text-center">
          <span style="font-size: 7em; color: white;">
            <i class="fas fa-volleyball-ball"></i>
          </span><br>
          <h5>Volley</h5>
        </div>
      </div>
    </div>
  </div>
  <div class="bg-2">
    <div class="container px-3 py-5">
      <!-- Owl Carousel -->
      <h1 class="text-center">Artikel Terbaru</h1>
      <div class="owl-carousel owl-theme">
        @foreach($Articles as $article)
          <div class="ml-2 mr-2">
            <div class="card">
              <img class="card-img-top" src="/images/TENNIS.jpeg" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">{{$article->title}}</h5>
                <p class="card-text">{!! Str_limit($article->content, 100) !!}</p>
                <a href="/artikel/{{$article->id}}/lihat" class="btn btn-primary text-center">Go somewhere</a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
  <div class="bg-3">
    <div class="container">
      <div class="row align-items-center section-4 text-center">
          <h1 class="col-md-12">Langkah Pemesanan</h1>
          <div class="col-md-3">
            <h1>1</h1>
            <p>Pilih Tanggal dan waktu pemesanan yang anda inginkan</p>
          </div>
          <div class="col-md-3">
            <h1>2</h1>
            <p>Pilih Lapangan yang tersedia</p>
          </div>
          <div class="col-md-3">
            <h1>3</h1>
            <p>Lakukan pembayaran</p>
          </div>
          <div class="col-md-3">
            <h1>4</h1>
            <p>Setelah pengelola lapangan mengkofirmasi pesanan. Lapangan siap digunakan</p>
          </div>
      </div>
    </div>
  </div>
  <div class="footer">
    Sepangan.co.id 2020
  </div>
@endsection

@section('footer')
  <script src="{{ url('/vendor/owlcarousel/owl.carousel.min.js')}}"></script>
  <script>
      $(document).ready(function(){
        $(".owl-carousel").owlCarousel({
          autoplay: true,
          autoplayHoverPause: true,
          items: 4,
          nav: true,
          dots: true,
        });

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
      });

      @if(Session::has('fail'))
        toastr.options.progressBar = true;
        toastr.error("{{ Session::get('fail') }}", "Gagal", {timeOut: 5000});
      @endif
  </script>
@endsection
