<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use App\Models\tipeAset;
use App\Models\Aset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class WebAsetController extends Controller
{
    public function page()
    {
        return redirect()->route('admin.aset');
    }

    public function index(Request $request)
    {
        if ($request->has('search')) {
            $data = Aset::where('nama_aset', 'LIKE', '%' . $request->search . '%')->paginate(5);
        } else {
            $data = DB::select('CALL GetAsetData()');
        }
        // dd($data);
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
            'harga' => 'required',
            'image' => 'image|file|max:50000',
            'kategori' => 'required',
            'deskripsi' => 'required',
        ]);
        $data['gambar'] = $request->file('image')->store('gambar-aset');

        Aset::create($data);
        return redirect()->route('admin.aset')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function tampil($idAset)
    {
        $data = Aset::find($idAset);
        $tipe = tipeAset::all();
        // $tipe_terpilih = tipeAset::where('tipe', $inputanUser)->first(); // Anda dapat mengganti ini sesuai dengan cara Anda mendapatkan data terpilih
        $kategori = kategori::all();
        return view('asettampildata', compact('data','tipe','kategori'));

    }

    public function update(Request $request, $idAset)
    {
        $validatedData = $request->validate([
            'nama_aset' => 'required',
            'alamat_aset' => 'required',
            'tipe' => 'required',
            'harga' => 'required',
            'image' => 'image|file|max:50000',
            'kategori' => 'required',
            'deskripsi' => 'required',
        ]);

        // Find the Aset record with the specified ID
        $aset = Aset::find($idAset);

        if (!$aset) {
            return redirect()->route('admin.aset')->with('error', 'Data tidak ditemukan');
        }

        // Handle image update
        if ($request->hasFile('image')) {
            if (!empty($aset->gambar)) {
                // Assuming 'gambar' is the image field
                Storage::delete($aset->gambar);
                $aset->delete();
            }
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('gambar-aset', $imageName); // Store in 'gambar-aset' directory

            // Update the 'gambar' field with the new image path
            $aset->gambar = 'gambar-aset/' . $imageName;
        }

        // Update other fields
        $aset->nama_aset = $validatedData['nama_aset'];
        $aset->alamat_aset = $validatedData['alamat_aset'];
        $aset->tipe = $validatedData['tipe'];
        $aset->harga = $validatedData['harga'];
        $aset->kategori = $validatedData['kategori'];
        $aset->deskripsi = $validatedData['deskripsi'];

        // Save the changes
        $aset->save();

        return redirect()->route('admin.aset')->with('success', 'Data Berhasil Diupdate');
    }

    public function delete($idAset)
    {
        $data = Aset::find($idAset);
        $data->delete();
        return redirect()->route('admin.aset')->with('success', 'Data Berhasil Di  Hapus');

    }

    public function dropdown()
    {

        $tipe = tipeAset::all();
        $kategori = kategori::all();
        return view('asettambah', compact('tipe', 'kategori'));
    }

}
