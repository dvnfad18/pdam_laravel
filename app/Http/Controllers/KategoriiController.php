<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use Illuminate\Http\Request;

class KategoriiController extends Controller
{
    public function index() 
    {
    $kategori = kategori::all(); // Retrieve all posts
    return response()->json(['data' => $kategori]);
    }

    public function store(Request $request)
    {
    $validatedData = $request->validate([

        'kategori' => 'required|string',
    
    ]);

    $kategori = Kategori::create($validatedData);

    return response()->json(['message' => 'Kategori created successfully', 'data' => $kategori], 201);
    }   

    public function update(Request $request, $idKategori)
{
    $kategori = Kategori::find($idKategori);

    if (!$kategori) {
        return response()->json(['message' => 'Kategori not found'], 404);
    }

    $validatedData = $request->validate([
        'kategori' => 'string',
    ]);

    $kategori->update($validatedData);

    return response()->json(['message' => 'Kategori updated successfully', 'data' => $kategori]);
}

public function destroy($idKategori)
{
    $kategori = Kategori::find($idKategori);

    if (!$kategori) {
        return response()->json(['message' => 'Kategori not found'], 404);
    }

    $kategori->delete(); }
}
