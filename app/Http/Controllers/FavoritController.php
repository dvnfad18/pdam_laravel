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
}
