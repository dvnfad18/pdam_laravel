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
    ]);

    $asets = Aset::create($validatedData);

    return response()->json(['message' => 'Admin created successfully', 'data' => $asets], 201);
    }   

    public function update(Request $request, $idAdmin)
{
    $admin = Admin::find($idAdmin);

    if (!$admin) {
        return response()->json(['message' => 'Admin not found'], 404);
    }

    $validatedData = $request->validate([
        'username' => 'string',
        'password' => 'string',
        'nama_adm' => 'string',
        'noTelp' => 'string',
    ]);

    $admin->update($validatedData);

    return response()->json(['message' => 'Admin updated successfully', 'data' => $admin]);
}

public function destroy($idAdmin)
{
    $admin = Admin::find($idAdmin);

    if (!$admin) {
        return response()->json(['message' => 'Admin not found'], 404);
    }

    $admin->delete();


}
}
