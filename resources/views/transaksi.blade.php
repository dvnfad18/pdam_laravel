{{-- 
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
@endsection --}}

{{-- 
@extends('template')

@section('subjudul')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Customer</li>
  </ol>
  <h6 class="font-weight-bolder text-white mb-0">Customer</h6>
</nav>
@endsection

@section('content')

    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Tabel Customer</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">id </th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">username</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">no_telp</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">email</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @if($data->count() > 0)
                    @foreach($data as $item)
                    <tr>
                     <td>{{$item->idCust}}</td>
                     <td>{{$item->namaCust}}</td>
                     <td>{{$item->no_telp}}</td>
                     <td>{{$item->email_Cust}}</td>
                    </tr>
                     @endforeach
                      @else
                          <p>Tidak ada data.</p>
                      @endif

                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection --}}


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
                    <div class="row g-3 align-items-center">
                      <div class="col-auto">
                        <form action="/transaksi" method="GET">
                          <input type="search" id="input" name="search" class="-control" aria-describedby="password">
                        </form>
                      </div>
                    </div>
                    
                    {{-- <div class="pb-2">
                      @if($message = Session::get('success'))
                       <div class="alert alert-succes" role="alert" >
                        {{$message}}
                       </div>
                      @endif
                    </div> --}}
                    
                    <table class="table-responsive">
                        <thead style="font-size: 10pt">
                            <tr style="background-color: rgb(196, 215, 243)">
                                <th class="col-md-1">Id</th>
                                <th class="col-md-1">Nama</th>
                                <th class="col-md-1">Aset</th>
                                <th class="col-md-1">Tipe</th>
                                <th class="col-md-1">Waktu awal</th>
                                <th class="col-md-1">Waktu akhir</th>
                                <th class="col-md-1">Jaminan</th>
                                <th class="col-md-1">Dp</th>
                                <th class="col-md-1">Total bayar</th>
                                <th class="col-md-2">Bukti jaminan</th>
                                <th class="col-md-2">Bukti bayar</th>
                                <th class="col-md-2">Status</th>
                                
                                {{-- <th class="col-md-2">Action</th> --}}
                            </tr>
                        </thead>
                        <tbody class="table-bordered">
                          
                          @foreach ($results as $result)
                        <tr>
                          <td>{{$result->idTrans}}</td>
                          <td>{{$result->namaCust}}</td>
                          <td>{{$result->nama_aset}}</td>
                          <td>{{$result->tipe}}</td>
                          <td>{{$result->waktu_awal}}</td>
                          <td>{{$result->waktu_akhir}}</td>
                          <td>{{$result->jaminan}}</td>
                          <td>{{$result->dp}}</td>
                          <td>{{$result->total_bayar}}</td>
                          <td>{{$result->bukti_jaminan}}</td>
                          <td>{{$result->bukti_bayar}}</td>
                          <td>{{$result->status}}</td>
                         </tr>
                          @endforeach
                          

                        </tbody>
                    </table>
                    {{-- {{$result->links()}} --}}
              </div>
              <!-- AKHIR DATA -->
        </main>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
      </body>
@endsection

