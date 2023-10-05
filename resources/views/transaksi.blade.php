
@extends('template')

@section('subjudul')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Transaksi</li>
  </ol>
  <h6 class="font-weight-bolder text-white mb-0">Transaksi</h6>
</nav>
@endsection

@section('content')
<body class="bg-light">
  <main class="container">
      <!-- START DATA -->
      <div class="my-3 p-3 bg-body rounded shadow-sm">
              <!-- FORM PENCARIAN -->
              <div class="pb-3">
                <form class="d-flex" action="" method="get">
                    <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
                    <button class="btn btn-secondary" type="submit">Cari</button>
                </form>
              </div>
              
              <!-- TOMBOL TAMBAH DATA -->
              <div class="pb-3">
                <a href='' class="btn btn-primary">+ Tambah Data</a>
              </div>
        
              <table class="table table-striped">
                  <thead>
                      <tr>
                          <th class="col-md-1">No</th>
                          <th class="col-md-3">NIM</th>
                          <th class="col-md-4">Nama</th>
                          <th class="col-md-2">Jurusan</th>
                          <th class="col-md-2">Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr>
                          <td>1</td>
                          <td>1001</td>
                          <td>Ani</td>
                          <td>Ilmu Komputer</td>
                          <td>
                              <a href='' class="btn btn-warning btn-sm">Edit</a>
                              <a href='' class="btn btn-danger btn-sm">Del</a>
                          </td>
                      </tr>
                  </tbody>
              </table>
        </div>
        <!-- AKHIR DATA -->
  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
@endsection