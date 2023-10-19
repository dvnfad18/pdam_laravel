<?php

namespace App\Http\Controllers;
use App\Models\Aset;
use Illuminate\Http\Request;

class AsetController extends Controller
{
    public function index() 
    {
    $asets = Aset::all(); // Retrieve all posts
    return response()->json(['data' => $asets]);
    }

    public function store(Request $request)
    {
    $validatedData = $request->validate([

        'nama_aset' => 'required|string',
        'alamat_aset' => 'required|string',
        'tipe' => 'required|int',
        'harga' => 'required|int',
        'image' => 'image|file|max:50000',
    ]);

    $asets = Aset::create($validatedData);

    return response()->json(['message' => 'Aset created successfully', 'data' => $asets], 201);
    }   

    public function update(Request $request, $idAset)
{
    $asets = Aset::find($idAset);

    if (!$asets) {
        return response()->json(['message' => 'Aset not found'], 404);
    }

    $validatedData = $request->validate([
        'nama_aset' => 'string',
        'alamat_aset' => 'string',
        'tipe' => 'int',
        'harga' => 'int',
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
