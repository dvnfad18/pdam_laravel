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
    if($request->has('search')){
                $results = Transaksi::where('namaCust', 'LIKE', '%'.$request->search.'%');
            }else{
    $results = DB::select('CALL GetTransactionDetails()');}
    return view('transaksi', compact('results'));
}

}
