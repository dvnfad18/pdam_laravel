<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use Illuminate\Http\Request;

class WebAdminController extends Controller
{

public function index(Request $request)
{
    if($request->has('search')){
        $data = Admin::where('username', 'LIKE', '%'.$request->search.'%')->paginate(5);
    }else{
    $data = Admin::paginate(5); }
    return view('admin', compact('data'));
    
}
public function tambah()
{
    return view('admintambah');
}

public function insert(Request $request)
{
    
    Admin::create($request->all()); 
    return redirect()->route('admin')->with('success','Data Berhasil Ditambahkan');
}

public function tampil($idAdmin)
{
   $data = Admin::find($idAdmin);
   return view('admintampildata', compact('data'));

}

public function update(Request $request, $idAdmin)
{
   $data = Admin::find($idAdmin);
   $data->update($request->all());
   return redirect()->route('admin')->with('success','Data Berhasil Di Update');

}

public function delete($idAdmin)
{
   $data = Admin::find($idAdmin);
   $data->delete();
   return redirect()->route('admin')->with('success','Data Berhasil Di  Hapus');
}
}

  