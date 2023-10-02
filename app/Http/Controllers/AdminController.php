<?php

namespace App\Http\Controllers;
use App\Models\Admin;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() 
    {
    $admins = Admin::all(); // Retrieve all posts
    return response()->json(['data' => $admins]);
    }

    public function store(Request $request)
    {
    $validatedData = $request->validate([
        'username' => 'required|string',
        'password' => 'required|string',
        'nama_adm' => 'required|string',
        'noTelp' => 'required|string',
    ]);

    $admin = Admin::create($validatedData);

    return response()->json(['message' => 'Admin created successfully', 'data' => $admin], 201);
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
