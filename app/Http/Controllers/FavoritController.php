<?php

namespace App\Http\Controllers;

use App\Models\favorit;
use Illuminate\Http\Request;

class FavoritController extends Controller
{
    public function index()
    {
        $asets = favorit::all(); // Retrieve all posts
        return response()->json(['data' => $asets]);
    }

    
    public function store(Request $request)
    {
    $validatedData = $request->validate([

        'nama_aset' => 'required|string',
        'jumlah_aset'=> 'required|int',
        'harga' => 'required|int',
        'dekripsi' => 'required|string',
        'image' => 'image|file|max:50000',
    ]);

    $asets = Aset::create($validatedData);

    return response()->json(['message' => 'Favorite created successfully', 'data' => $asets], 201);
    }   

    public function update(Request $request, $idAset)
{
    $asets = Aset::find($idAset);

    if (!$asets) {
        return response()->json(['message' => 'Favorite not found'], 404);
    }

    $validatedData = $request->validate([
        'nama_aset' => 'string',
        'jumlah_aset' => 'string',
        'harga' => 'int',
        'deskripsi' => 'int',
    ]);

    $asets->update($validatedData);

    return response()->json(['message' => 'Aset updated successfully', 'data' => $asets]);
}

public function destroy($idAset)
{
    $asets = Aset::find($idAset);

    if (!$asets) {
        return response()->json(['message' => 'Aset not found'], 404);
    }

    $asets->delete();

}
}
