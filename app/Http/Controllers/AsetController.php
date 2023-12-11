<?php

namespace App\Http\Controllers;
use App\Models\Aset;
use App\Models\Like;
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

public function getDataAset(Request $request)
{
    $idCust = $request->input('idCust');

    $asets = Aset::all();

    if ($asets->isEmpty()) {
        return response()->json([
            'success' => false,
            'message' => 'No data found',
            'data' => null
        ]);
    } else {
        $response = $asets->toArray();
        // Fetch the like data for the given customer ID
        $likes = Like::whereIn('idCust', $asets->pluck('idCust'))
                     ->where('idCust', $idCust)
                     ->orderBy('created_at', 'desc')
                     ->get();
        foreach ($response as &$aset) {
            // Check if 'idCust' exists in the $aset array before accessing it
            if (array_key_exists('idCust', $aset)) {
                // Check if 'idCust' exists in the $likes collection
                $aset['is_liked'] = $likes->contains('idCust', $aset['idCust']);
                
                // Access the image property directly on the $aset object
                $aset['gambar'] = $aset['image']; // Replace 'image' with your actual image field name
            } else {
                // Handle the case where 'idCust' is not present in the $aset array
                $aset['is_liked'] = false;
            }
        }
    }
    return response()->json($response);
}



}
