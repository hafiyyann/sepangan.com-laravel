@extends('layouts.superadmin.app')

@section('header')
  <title>Daftar Artikel</title>
  <link href="{{ url('/css/adminLapangan/daftarLapangan.css') }}" rel="stylesheet" media="all">
@endsection

@section('content')
  <div class="main-content">
    <div class="row no-gutters title-page">
      <div class="col-sm-9">
        <div class="row">
          <div class="col-sm-12 col-12 mb-2">
            <h1>Daftar Artikel</h1>
          </div>
          <div class="col-sm-12 col-12 mb-2">
            <a href="{{ url('/admin/Artikel/tambah') }}" class="btn btn-primary">+ Tambah Artikel</a>
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
                        <th class="text-center">Tanggal Posting</th>
                        <th class="text-center">Judul</th>
                        <th class="text-center">Penulis</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($articles as $article)
                    <tr>
                        <td class="align-middle text-center">{{ $article->id }}</td>
                        <td class="align-middle text-center">{{ $article->created_at }}</td>
                        <td class="align-middle text-center">{{ $article->title }}</td>
                        <td class="align-middle text-center">{{ $article->author }}</td>
                        <td class="text-center"> <a href="/admin/Artikel/{{$article->id}}/detail" class="btn btn-primary">Lihat</a> </td>
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
