<?php

namespace App\Http\Controllers;
use App\Models\kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function page()
    {
        return redirect()->route('admin.kategori');
    }

    public function index(Request $request)
    {
        if ($request->has('search')) {
            $data = Kategori::where('kategori', 'LIKE', '%' . $request->search . '%')->paginate(5);
        } else {
            $data = Kategori::paginate(5); 
        }
        // dd($data);
        return view('kategori', compact('data'));

    }

    public function tambah()
    {
        return view('kategoritambah');
    }

    public function insert(Request $request)
    {

        $data = $request->validate([
            'kategori' => 'required',
           
        ]);
        $validatedData['kategori'] = $request->kategori;
        Kategori::create($data);
        return redirect()->route('admin.kategori')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function tampil($idKategori)
    {
        $data = Kategori::find($idKategori);
        return view('kategoritampil', compact('data'));

    }

    public function update(Request $request, $idKategori)
    {
        $data = Kategori::find($idKategori);
        $data->update($request->all());
        return redirect()->route('admin.kategori')->with('success', 'Data Berhasil Di Update');

    }

    public function delete($idKategori)
    {
        $data = Kategori::find($idKategori);
        $data->delete();
        return redirect()->route('admin.kategori')->with('success', 'Data Berhasil Di  Hapus');

    }

    public function dropdown()
    {

        $data = Kategori::all();
        // $kategori = kategori::all();
        return view('kategoritambah', compact('data'));
    }
}
