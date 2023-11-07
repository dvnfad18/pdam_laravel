
@extends('template')

@section('subjudul')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Customers</li>
  </ol>
  <h6 class="font-weight-bolder text-white mb-0">Customers</h6>
</nav>
@endsection

@section('content')

      <body class="bg-light">
        <main class="container">
            <!-- START DATA -->
            <div class="my-3 p-3 bg-body rounded shadow-sm">

                    <!-- FORM PENCARIAN -->
                    {{-- <div class="row g-3 align-items-center">
                      <div class="col-auto">
                        <form action="/pdam/customers" method="GET">
                          <input type="search" id="input" name="search" class="-control" aria-describedby="password">
                        </form>
                      </div>
                    </div> --}}
                    
                    <div class="col-md-3">
                      <div class="form-group">
                          <form action="/pdam/customers" method="GET">
                              <div class="input-group">
                              <input id="input" name="search" class="form-control"
                                   placeholder="Search...">
                              {{-- <button type="submit" class="btn btn-primary">Search </button> --}}
                              </div>
                          </form>
                      </div>
                  </div>
                  
                  <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead style="font-size: 10pt">
                            <tr style="background-color: rgb(196, 215, 243)">
                                <th class="col-md-1">Id</th>
                                <th class="col-md-2">Nama</th>
                                <th class="col-md-2">No_telp</th>
                                <th class="col-md-2">Email</th>
                                <th class="col-md-2">Alamat</th>
                                {{-- <th class="col-md-2">Action</th> --}}
                            </tr>
                        </thead>
                        <tbody class="table-bordered">
                          @if($data->count() > 0)
                          @foreach($data as $item)
                          <tr style="font-size: 10pt">
                            {{-- <th scope="item">{{$item}}</th> --}}
                           <td>{{$item->idCust}}</td>
                           <td>{{$item->namaCust}}</td>
                           <td>{{$item->no_telp}}</td>
                           <td>{{$item->email_Cust}}</td>
                           <td>{{$item->alamat}}</td>
                           {{-- <td>
                            <a href="/tampildata/{{$item->idAdmin}}" class="btn btn-success btn-sm">Edit</a>
                            <a href="/delete/{{$item->idCust}}" class="btn btn-danger btn-sm">Delete</a>
                           </td> --}}
                          </tr>
                           @endforeach
                            @else
                                <p>Tidak ada data.</p>
                            @endif
                        </tbody>
                    </table>
                    {{$data->links()}}
                  </div>
              </div>
              <!-- AKHIR DATA -->
        </main>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
      </body>
@endsection