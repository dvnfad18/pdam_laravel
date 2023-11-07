<?php

namespace App\Http\Controllers;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WebTransaksiController extends Controller
{
//     public function index(Request $request)
// {
//     if($request->has('search')){
//         $data = Transaksi::where('idCust', 'LIKE', '%'.$request->search.'%')->paginate(5);
//     }else{
//     $data = Transaksi::paginate(5); }
//     return view('transaksi', compact('data'));
// }

public function prosedur(Request $request)
{
$data = DB::select('CALL GetTransactionDetails()');

$searchTerm = $request->search;

$data = array_filter($data, function($item) use ($searchTerm) {
    return strpos($item->namaCust, $searchTerm) !== false || strpos($item->nama_aset, $searchTerm) !== false
    || strpos($item->status, $searchTerm) !== false;
});

$data = array_slice($data, 0, 5);

$data = new \Illuminate\Pagination\LengthAwarePaginator($data, count($data), 5);

return view('transaksi', ['data' => $data]);
}

// if($request->has('search')){
//     $results = Transaksi::where('namaCust', 'LIKE', '%'.$request->search.'%');
// }else{
// $results = DB::select('CALL GetTransactionDetails()');}
// return view('transaksi', compact('results'));

// if ($request->has('search')) {
//     $data = Aset::where(function($query) use ($request) {
//         $query->where('nama_aset', 'LIKE', '%' . $request->search . '%')
//               ->orWhere('alamat_aset', 'LIKE', '%' . $request->search . '%');
//     })->paginate(5);
// } else {
//     $data = DB::select('CALL GetAsetData()');
// }

// return view('aset', compact('data'));
}
