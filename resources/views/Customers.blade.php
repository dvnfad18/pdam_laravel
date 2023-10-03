
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
@endsection