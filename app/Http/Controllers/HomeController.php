<?php

namespace App\Http\Controllers;
use App\Models\customer;
use App\Models\Aset;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function dashboard(){
        $jumlah_cust = Customer::count(); 
        $jumlah_aset = Aset::count(); 
        $jumlah_transaksi = Transaksi::count(); 
        return view('dashboard' , compact('jumlah_cust', 'jumlah_aset', 'jumlah_transaksi'));
    }

    // public function count()
    // {
    //     $jumlah_cust = Customer::count(); // Mengambil jumlah pengguna
    //     return view('dashboard', compact('jumlah_cust'));
    // }
}
