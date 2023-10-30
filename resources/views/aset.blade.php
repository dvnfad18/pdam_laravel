@extends('template')

@section('subjudul')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Aset</li>
        </ol>
        <h6 class="font-weight-bolder text-white mb-0">Aset</h6>
    </nav>
@endsection

@section('content')

    <body class="bg-light">
        <main class="container">
            <!-- START DATA -->
            <div class="my-3 p-3 bg-body rounded shadow-sm">

                <!-- TOMBOL TAMBAH DATA -->
                <div class="pb-2">
                    <a href='asettambah' class="btn btn-primary">+ Tambah Data</a>
                </div>

                <!-- FORM PENCARIAN -->
                <div class="row g-3 align-items-center">
                    <div class="col-3">
                        <form action="/pdam/aset" method="GET">
                            <input type="search" id="input" name="search" class="form-control"
                                aria-describedby="password" text="search">
                        </form>
                    </div>
                </div>

                <div class="pb-2">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-succes" role="alert">
                            {{ $message }}
                        </div>
                    @endif
                </div>

                <table class="table-responsive" s  >
                    <thead >
                        <tr style="background-color: rgb(196, 215, 243)">
                            <th class="col-md-1">id</th>
                            <th class="col-md-2">Gambar</th>
                            <th class="col-md-2">Nama Aset</th>
                            <th class="col-md-2">Deskripsi</th>
                            <th class="col-md-2">Alamat</th>
                            <th class="col-md-2">Tipe</th>
                            <th class="col-md-2">Kategori</th>
                            <th class="col-md-2">Harga</th>
                            <th class="col-md-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr >
                                {{-- <th scope="item">{{$item}}</th> --}}
                                <td>{{ $item->idAset }}</td>
                                <td><img src="{{ asset('storage/'. $item->gambar) }}" alt="Gambar"width="100" height="auto"></td>
                                <td>{{ $item->nama_aset }}</td>
                                <td>{{ $item->deskripsi }}</td>
                                <td>{{ $item->alamat_aset }}</td>
                                <td>{{ $item->tipe }}</td>
                                <td>{{ $item->kategori }}</td>
                                <td>{{ $item->harga }}</td>
                                <td>
                                    <a href="/pdam/asettampildata/{{ $item->idAset }}"  >
                                        <img src="/icon/menuicon/edit.png" style="max-height: 20px; max-width: 20px">
                                    </a>
                                    <a href="/pdam/asetdelete/{{ $item->idAset }}"  >
                                        <img src="/icon/menuicon/delete.png" style="max-height: 20px; max-width: 20px">
                                    </a>
                                    {{-- <a href="/pdam/asettampildata/{{ $item->idAset }}" class="btn btn-success btn-sm">Edit</a>
                                    <a href="/pdam/asetdelete/{{ $item->idAset }}" class="btn btn-danger btn-sm">Delete</a> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- AKHIR DATA -->
        </main>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
        </script>
    </body>
@endsection
