<?php

namespace App\Http\Controllers;

use App\Models\getdetilaset;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index()
    {
        $asets = getdetilaset::all(); // Retrieve all posts
        return response()->json(['data' => $asets]);
    }
}
