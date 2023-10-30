<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use App\Models\tipeAset;

use Illuminate\Http\Request;

class TipeController extends Controller
{
    public function page()
    {
        return redirect()->route('admin.tipe');
    }

    public function index(Request $request)
    {
        if ($request->has('search')) {
            $data = tipeAset::where('tipe', 'LIKE', '%' . $request->search . '%')->paginate(5);
        } else {
            $data = tipeAset::paginate(5); 
        }
        // dd($data);
        return view('tipe', compact('data'));

    }

    public function tambah()
    {
        return view('tipetambah');
    }

    public function insert(Request $request)
    {

        $data = $request->validate([
            'tipe' => 'required',
           
        ]);
        $validatedData['tipe'] = $request->tipe;
        tipeAset::create($data);
        return redirect()->route('admin.tipe')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function tampil($idTipe)
    {
        $data = tipeAset::find($idTipe);
        return view('tipetampildata', compact('data'));

    }

    public function update(Request $request, $idTipe)
    {
        $data = tipeAset::find($idTipe);
        $data->update($request->all());
        return redirect()->route('admin.tipe')->with('success', 'Data Berhasil Di Update');

    }

    public function delete($idTipe)
    {
        $data = tipeAset::find($idTipe);
        $data->delete();
        return redirect()->route('admin.tipe')->with('success', 'Data Berhasil Di  Hapus');

    }

    public function dropdown()
    {

        $tipe = tipeAset::all();
        $kategori = kategori::all();
        return view('tipetambah', compact('tipe', 'kategori'));
    }
}
