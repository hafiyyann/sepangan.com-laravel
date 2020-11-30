@extends('layouts.superadmin.app')

@section('header')
  <title>Daftar Pengguna</title>
  <link href="{{ url('/css/adminLapangan/daftarLapangan.css') }}" rel="stylesheet" media="all">
@endsection

@section('content')
  <div class="main-content">
    <div class="row no-gutters title-page">
      <div class="col-sm-9">
        <div class="row">
          <div class="col-sm-12 col-12 mb-2">
            <h1>Daftar Pengguna</h1>
          </div>
        </div>
      </div>
    </div>
    <div class="row no-gutters table-lapangan">
      <div class="col-md-9">
        <div class="table-responsive table--no-card m-b-40">
            <table class="table table-borderless table-striped table-earning">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">Nama Pengguna</th>
                        <!-- <th class="text-center">Nama Pemilik</th> -->
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($data_user as $user)
                    <tr>
                        <td class="align-middle text-center">{{ $user->id }}</td>
                        <td class="align-middle text-center">{{ $user->name }}</td>
                        <!-- <td class="align-middle text-center">{{ $user->name}}</td> -->
                        <td class="text-center"> <a href="/admin/Pengguna/{{$user->id}}/detail" class="btn btn-primary">Lihat</a> </td>
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
  </script>
@endsection
