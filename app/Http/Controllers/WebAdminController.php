<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use Illuminate\Http\Request;

class WebAdminController extends Controller
{

public function index()
{
    $data = Admin::all();
    return view('admin', compact('data'));
    
}
public function tambah()
{
    return view('admintambah');
}

public function insert(Request $request)
{
    // dd($request->all());
    Admin::create($request->all()); 
    return redirect()->route('admin')->with('success','Data Berhasil Ditambahkan');
}

public function tampil($idAdmin)
{
   $data = Admin::find($idAdmin);
   return view('admintampildata', compact('data'));
//    dd($data);
}

public function update(Request $request, $idAdmin)
{
   $data = Admin::find($idAdmin);
   $data->update($request->all());
   return redirect()->route('admin')->with('success','Data Berhasil Di Update');
//    dd($data);
}

public function delete($idAdmin)
{
   $data = Admin::find($idAdmin);
   $data->delete();
   return redirect()->route('admin')->with('success','Data Berhasil Di  Hapus');
//    dd($data);
}
}

  