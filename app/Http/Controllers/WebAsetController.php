<?php

namespace App\Http\Controllers;
use App\Models\Aset;
use Illuminate\Http\Request;

class WebAsetController extends Controller
{
    public function page()
    {
        return redirect()->route('admin.aset');
    }
    
    public function index(Request $request)
{
    if($request->has('search')){
        $data = Aset::where('nama_aset', 'LIKE', '%'.$request->search.'%')->paginate(5);
    }else{
    $data = Aset::paginate(5); }
    return view('aset', compact('data'));
    
}
public function tambah()
{
    return view('asettambah');
}

public function insert(Request $request)
{
    // return $request->file('image')->store('gambar-aset');
    
    $data = $request->validate([
        'nama_aset' => 'required',
        'alamat_aset' => 'required',
        'tipe' => 'required',
        'harga'=> 'required',
        'image' => 'image|file|max:50000',
    ]);
        $data['gambar'] = $request->file('image')->store('gambar-aset');
    Aset::create($data);
    return redirect()->route('admin.aset')->with('success','Data Berhasil Ditambahkan');
}

public function tampil($idAset)
{
   $data = Aset::find($idAset);
   return view('asettampildata', compact('data'));

}

public function update(Request $request, $idAset)
{
   $data = Aset::find($idAset);
   $data->update($request->all());
   return redirect()->route('admin.aset')->with('success','Data Berhasil Di Update');

}

public function delete($idAset)
{
   $data = Aset::find($idAset);
   $data->delete();
   return redirect()->route('admin.aset')->with('success','Data Berhasil Di  Hapus');

}
}
